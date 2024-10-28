<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Plans;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\CompanyRegister;


class RegisterController extends Controller
{
    //
    public function store(Request $request)
    {



        $data = $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'work_status' => ['required', 'string'],
                'resume' => ['required', 'file', 'mimes:pdf,doc,docx', 'max:2048'],
                'mobile' => ['required', 'string', 'regex:/^[0-9]{10}$/', 'unique:users'], // Validating a 10-digit mobile number
            ]
        );

        $resumeName = time() . '_' . $data['resume']->getClientOriginalName();
        $data['resume']->move(public_path('resumes'), $resumeName);




        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'password' => Hash::make($data['password']),
            'work_status' => $data['work_status'],
            'resume' => 'resumes/' . $resumeName,
            'role' => 'employee',
        ]);
        Mail::to($data['email'])->send(new CompanyRegister($data));

        return  redirect('candidate/login')->with('s', 'Registration Successful Please logged in');
    }

    public function companyStore(Request $request)
    {

        $data = $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'unique:users,email', 'string', 'max:255'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'mobile' => ['required', 'unique:users,mobile', 'string', 'max:10'],

            ]
        );

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'email_verified_at' => 0,
            'mobile' => $data['mobile'],
            'password' => Hash::make($data['password']),
            'role' => 'company',
            // 'activate_plan_id' => 1,
        ]);

        Mail::to($data['email'])->send(new CompanyRegister($data));

        return  redirect('company/login')->with('s', 'mail is send on your email please verify the email');
    }

    // without login
    public function byplanStore(Request $request, $planid, $type)
    {


        $data = $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'max:255'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'mobile' => ['required', 'string', 'max:10'],
                'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',


            ]
        );
        $u = User::where('email', $data['email'])->first();
        if (empty($u)) {
            $u = new User;

            $u->password = Hash::make($data['password']);
            $u->email = $data['email'];
            $u->mobile = $data['mobile'];
        }
        $img = "";
        if ($request->hasFile('profile_picture')) {
            $profile_picture = time() . '_' . $data['profile_picture']->getClientOriginalName();
            $data['profile_picture']->move(public_path('profile_picture'), $profile_picture);
            $u->profile_picture  = 'profile_picture/' . $profile_picture;
        }


        $u->name = $data['name'];
        $u->role = 'company';
        $u->save();






        return  redirect('byplanpayment/' . $u->id . '/' . $planid . '/' . $type);
    }
    public function byplanPayment($id, $plan_id, $type)
    {
        $p = Plans::where('id', $plan_id)->first();
        $price = 0;
        if ($type == 'monthly') {
            $price = $p->price_monthly;
        } else {
            $price = $p->price_annualy;
        }
   
        return view('frontend.auth.plan.plan', ['plan'=>$p, 'price' => $price, 'user_id' => $id, 'plan_id' => $plan_id, 'type' => $type]);
    }
    // public function files
}
