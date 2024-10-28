<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;
use App\Models\Payment;
use App\Models\Plans;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Mail\PlanPaymentMail;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function showPaymentForm($id, $type)
    {

        $plans = Plans::find($id);
        if (empty($plans)) {
            return redirect()->route('company.dashboard');
        }

        return view('company.payment.payment', ['plan_id' => $id, 'type' => $type]);
    }

    public function processPayment(Request $request, $plan_id, $type)
    {
        $request->validate([
            'stripeToken' => 'required',
        ]);

        $plans = Plans::find($plan_id);


        $amount = 0;

        $plan_start_date = date('Y-m-d');

        if ($type == "yearly") {
            $amount = $plans->price_annualy;
            $plan_end_date = date('Y-m-d', strtotime($plan_start_date . ' + ' . $plans->duration_in_years . ' years'));
        } else {
            $amount = $plans->price_monthly;
            $plan_end_date = date('Y-m-d', strtotime($plan_start_date . ' + ' . $plans->duration_in_month . ' month'));
        }


        $usser = Auth::user();


        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            // Create a customer
            $customer = Customer::create([
                'email' => $usser['email'], // You can get this from the user
                'source' => $request->stripeToken,
            ]);

            // Create a charge
            $charge = Charge::create([
                'amount' => $amount * 100, // amount in cents
                'currency' => 'usd',
                'customer' => $customer->id,
                'description' => 'Payment Description',
            ]);

            // Store payment details in the database
            $p = Payment::create([
                'stripe_id' => $charge->id,
                'amount' => $amount,
                'currency' => $charge->currency,
                'description' => $charge->description,
                'customer_email' => $customer->email,
                'plan_id' => $plan_id,
                'plan_start_date' => $plan_start_date,
                'plan_end_date' => $plan_end_date,
                'user_id' => $usser['id'],
                'type' => $type,
                'plans_details' => json_encode($plans),
            ]);

            $u = User::find($usser['id']);
            $u->activate_plan_id =  $p->id;
            $u->save();
            $plan = Plans::find($plan_id);
            $planDetails = $plan ? $plan->toArray() : [];
            $planDetails['amount'] =  $amount;
            $planDetails['plan_start_date'] =  $plan_start_date;
            $planDetails['plan_end_date'] =  $plan_end_date;
            

            Mail::to($u->email)->send(new PlanPaymentMail($planDetails));

            // Construct the subdomain URL
            // $subdomain = "pratima"; // Make sure to replace 'yourdomain.com' with your actual domain
            // $url = route('company.dashboard', [], false); 
            // Redirect to the user's subdomain
            // Construct the full URL with the subdomain
            return redirect()->route('company.dashboard')->with('success', 'Payment successful!');
        } catch (\Exception $e) {
            return redirect()->route('company.payment.form', ['id' => $plan_id, 'type' => $type])->with('e', $e->getMessage());
        }
    }
    public function processPaymentwithoutLogin(Request $request, $user_id, $plan_id, $type)
    {



        $request->validate([
            'stripeToken' => 'required',
        ]);

        $plans = Plans::find($plan_id);
        $amount = 0;

        $plan_start_date = date('Y-m-d');

        if ($type == "yearly") {
            $amount = $plans->price_annualy;
            $plan_end_date = date('Y-m-d', strtotime($plan_start_date . ' + ' . $plans->duration_in_years . ' years'));
        } else {
            $amount = $plans->price_monthly;
            $plan_end_date = date('Y-m-d', strtotime($plan_start_date . ' + ' . $plans->duration_in_month . ' month'));
        }


        $usser = User::find($user_id);


        Stripe::setApiKey(config('services.stripe.secret'));

        try {
            // Create a customer
            $customer = Customer::create([
                'email' => $usser->email, // You can get this from the user
                'source' => $request->stripeToken,
            ]);

            // Create a charge
            $charge = Charge::create([
                'amount' => $amount * 100, // amount in cents
                'currency' => 'usd',
                'customer' => $customer->id,
                'description' => 'Payment Description',
            ]);

            // Store payment details in the database
            $p = Payment::create([
                'stripe_id' => $charge->id,
                'amount' => $amount,
                'currency' => $charge->currency,
                'description' => $charge->description,
                'customer_email' => $customer->email,
                'plan_id' => $plan_id,
                'plan_start_date' => $plan_start_date,
                'plan_end_date' => $plan_end_date,
                'user_id' => $usser->id,
                'type' => $type,
                'plans_details' => json_encode($plans),
            ]);

            $u = User::find($usser->id);
            $u->activate_plan_id =  $p->id;
            $u->save();

            return redirect('/')->with('s', 'Payment successful! Please Loged In ');
        } catch (\Exception $e) {
            // $user_id, $plan_id, $type
            // return redirect('byplanpayment/{userid}/{plan_id}/{type}')->route('company.payment.form', ['id' => v, 'type' => $type])->with('e', $e->getMessage());
            return redirect('byplanpayment/' . $user_id . '/' . $plan_id . '/' . $type)->with('e', $e->getMessage());
        }
    }
    public function afterpayment($username = null)
    {
        return view('company.payment.afterpayment', ['username' => $username]);
    }
}
