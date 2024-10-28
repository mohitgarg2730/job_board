<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;


class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('auth.passwords.email');
    }

    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = User::where('email', $request->email)->first();
       
        if (!$user) {
            return back()->withErrors(['email' => 'We could not find a user with that email address.']);
        }

        $otp = rand(100000, 999999); // Generate a random OTP (you can use a more secure method)

        // Store OTP in user table or cache for verification
        $user->otp = $otp;
        $user->otp_expiry = Carbon::now()->addMinutes(5); // OTP expiration time set to 5 minutes
        $user->save();

        // Send OTP via email
        Mail::to($user->email)->send(new ResetPasswordMail($otp));

        return redirect()->route('password.reset')->with('email', $user->email);
    }

    public function showResetPasswordForm(Request $request)
    {
        return view('auth.passwords.reset', ['email' => $request->session()->get('email')]);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|numeric',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || $user->otp != $request->otp) {
            return back()->withErrors(['otp' => 'The OTP entered is incorrect.']);
        }
         // Check OTP expiration
         if (Carbon::now()->gt($user->otp_expiry)) {
            return back()->withErrors(['otp' => 'The OTP has expired. Please request a new one.']);
        }

        // Update user password
        $user->password = Hash::make($request->password);
        $user->save();

        // Clear OTP
        $user->otp = null;
        $user->otp_expiry = null;
        $user->save();

        return redirect('/')->with('s', 'Your password has been reset successfully.');
    }
}