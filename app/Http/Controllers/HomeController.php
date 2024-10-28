<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use App\Models\Skills;
use App\Models\GuestJobPayment;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;
use App\Models\Page;
use App\Models\Blog;
use App\Models\Plans;
use App\Models\Payment;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    public function blogs()
    {
        return view('frontend.pages.blogs');
    }
    public function companies()
    {
        return view('frontend.pages.companies');
    }
    public function singleblog($slug)
    {

        $blog = Blog::where('slug', $slug)->first();

        return view('frontend.pages.singleblog', ['blog' => $blog]);
    }
    public function page(Request $request)
    {
        $segments = $request->segments();
        // Get the last segment
        $lastSegment = end($segments);
        $p = Page::where('page_slug', $lastSegment)->first();
        if (empty($p)) {
            return redirect('/');

        }
        return view('frontend.page', ['page' => $p]);

        // echo"<pre>";
        // print_r($p);
    }
    public function index()
    {
        $jobs = Job::get();
        return view('frontend.pages.newhome', ['jobs' => $jobs]);
    }
    public function company_detail($id, $name)
    {

        $id = base64_decode($id);
        $c = User::with('cate')->where('role', 'company')->where('id', $id)->first();
        $jobs = Job::select('jobs.*')
            ->where('user_id', $id)
            ->get();
        foreach ($jobs as $job) {
            $skillIds = explode(',', $job->skills);
            $job->skills = Skills::whereIn('id', $skillIds)->get();
        }
        return view('frontend.pages.company-detail', ['c' => $c, 'jobs' => $jobs]);
    }


    public function gust_job_add()
    {

        return view('gustjobs.form');

    }
    public function gust_job_store(Request $request)
    {
        $validatedData = $request->validate([
            'job_title' => 'required|string|max:255',
            'job_description' => 'nullable',
'email' => 'nullable|email|unique:users,email',
            'phone_number' => 'nullable',
            'job_level_id' => 'nullable',
            'experience_id' => 'nullable',
            'qualification_id' => 'nullable',
            'gender' => 'nullable',
            'job_expiry_date' => 'nullable|date',
            'job_fee_type_id' => 'nullable',
            'address' => 'nullable',
            'zip_code' => 'nullable',
            'city_id' => 'nullable',
            'country_id' => 'nullable',
            'job_category_id' => 'nullable',
            'job_type_id' => 'nullable',
            'min_salary' => 'nullable|numeric',
            'max_salary' => 'nullable|numeric',
            'plan_id' => 'nullable|integer',
        ]);

     
        Stripe::setApiKey(config('services.stripe.secret'));
        // echo"<pre>";
        // print_r( $plans);
        // echo"<pre>";
        // print_r( $validatedData);
        // echo"<pre>";
        // print_r( $_POST);
      
        try {


            $plan_id = $validatedData['plan_id'];
            $plans = Plans::find($plan_id);
            $amount = 0;
    
            $plan_start_date = date('Y-m-d');
            $type = 'monthly';
    
            if ($type == "yearly") {
                $amount = $plans->price_annualy;
                $plan_end_date = date('Y-m-d', strtotime($plan_start_date . ' + ' . $plans->duration_in_years . ' years'));
            } else {
                $amount = $plans->price_monthly;
                $plan_end_date = date('Y-m-d', strtotime($plan_start_date . ' + ' . $plans->duration_in_month . ' months'));
            }
    



            // Create a Stripe customer
            $customer = Customer::create([
                'email' =>$validatedData['email'],
                'source' => $request->stripeToken,
            ]);
           
            // Create a charge
            $charge = Charge::create([
                'amount' => $amount * 100, // amount in cents
                'currency' => 'usd',
                'customer' => $customer->id,
                'description' => 'Payment Description',
            ]);









            $user = User::create([
                'name' => 'job board',
                'email' => $validatedData['email'],
                'email_verified_at' => 1,
                'mobile' => $validatedData['phone_number'],
                'password' => Hash::make('company@123'),
                'role' => 'company',
            ]);
            $user = User::find($user->id);
            // echo"<pre>";
            // print_r($user);
            // die;
         














            // Store payment details
            $payment = Payment::create([
                'stripe_id' => $charge->id,
                'amount' => $amount,
                'currency' => $charge->currency,
                'description' => $charge->description,
                'customer_email' => $customer->email,
                'plan_id' => $plan_id,
                'plan_start_date' => $plan_start_date,
                'plan_end_date' => $plan_end_date,
                'user_id' => $user->id,
                'type' => $type,
                'plans_details' => json_encode($plans),
            ]);
            $userr1 = User::find($user->id);

            $userr1->activate_plan_id = $payment->id;
            $userr1->save();

            return redirect('/')->with('s', 'Payment successful! Please Log In. password is send on your mail');
        } catch (\Exception $e) {
            return back()->with('e', 'Payment failed: ' . $e->getMessage());
        }
    }


    public function job_detail($id)
    {

        $jobs = Job::with(['user', 'cat', 'types', 'levels', 'qual'])->where('id', $id)->with('user')->first();
        $jobsSim = Job::with(['user', 'cat', 'types', 'levels', 'qual'])->where('job_category_id', $jobs['job_category_id'])->where('id', '!=', $jobs->id)->take(10)->with('user')->get();

        return view('job.singlejobs', ['job' => $jobs, 'jobsSim' => $jobsSim]);


    }

}
