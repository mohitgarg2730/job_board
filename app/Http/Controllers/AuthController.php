<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\CompanyRegister;

class AuthController extends Controller
{


    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('e', '');
    }
    public function adminLogout()
    {
        Auth::logout();
        return redirect('admin/login')->with('e', '');
    }

    public function LoginAdmin(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['role'] = 'Admin';

        if (Auth::guard('web')->attempt($credentials)) {
            return redirect('admin/dashboard');
        }
        return redirect('admin/login')->with('e', 'credentials does not match');
    }
    public function LoginCandidate(LoginRequest $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $credentials['role'] = 'employee';


        if (Auth::attempt($credentials, $request->remember)) {

            if (Auth::user()->email_verified_at == 1) {
                $request->session()->regenerate();

                return redirect('candidate/dashboard'); // Redirect to intended page or home
            } else {
                // If email is not verified, log out and redirect to a verification notice
                Auth::logout();
                $data = User::where('email', $credentials['email'])->first()->toArray();

                Mail::to($credentials['email'])->send(new CompanyRegister($data));

                return back()->with('e', 'Please verify your email address.');
            }
        }

        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ]);
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->with('e', 'The provided credentials do not match our records.');
    }
    public function CompanyCandidate(LoginRequest $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $credentials['role'] = 'company';


        // if (Auth::attempt($credentials, $request->remember ,['email_verified_at'=> 1])) {
        //     $request->session()->regenerate();

        //     return redirect('company/dashboard'); // Redirect to intended page or home
        // }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->remember)) {
            if (Auth::user()->email_verified_at == 1) {
                // Email is verified, regenerate session and redirect
                $request->session()->regenerate();

                return redirect('company/dashboard'); // Redirect to the intended page
            } else {
                // If email is not verified, log out and redirect to a verification notice
                Auth::logout();
                $data = User::where('email', $credentials['email'])->first()->toArray();

                Mail::to($credentials['email'])->send(new CompanyRegister($data));

                return back()->with('e', 'Please verify your email address.');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);



        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ]);

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->with('e', 'The provided credentials do not match our records.');
    }
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (!$token = Auth::guard('api')->attempt($credentials)) {

            return response()->json(['error' => 'Unauthorized'], 401);
        }

        if (!Auth::guard('api')->user()->hasVerifiedEmail()) {
            Auth::guard('api')->logout();
            return response()->json(['error' => 'Link is send on your email Please verify you Email First'], 401);
        }


        return $this->respondWithToken($token);
    }
    public function Userregistration(UserStoreRequest $request)
    {

        $user = $request->only('email', 'password', 'name', 'mobile');

        if (User::insert($user)) {

            // Mail::to($user['email'])->send(new CompanyRegister($user));
            return response()->json(['message' => 'mail is send on your email'], 200);
        }
        return response()->json(['error' => 'please try after some time'], 401);
    }

    protected function respondWithToken($token)
    {

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('api')->factory()->getTTL() * 60,
        ]);
    }
    public function refresh()
    {
        return $this->respondWithToken(Auth::guard('api')->refresh());
    }


    public function emailverify($token)
    {

        $encrypted_data = base64_decode($token);
        $user = User::where('email', $encrypted_data)->first();

        if ($user) {
            $user->email_verified_at = 1;
            $user->save();

            return redirect('/')->with('s', 'Email verified, please log in.');
        } else {
            // Handle invalid token or no user found
            return redirect('/')->with('e', 'Invalid verification token.');
        }
    }

    public function email_check(Request $request)
    {
        // Validate email input
        $request->validate([
            'email' => 'required|email'
        ]);

        // Example: Perform some action, e.g., checking if the email exists in the database
        $emailExists = User::where('email', $request->email)->exists();

        // Prepare the response data
        $response = [
            'success' => true,
            'email_exists' => $emailExists,
            'message' => $emailExists ? 'Email already exists.' : 'Email is available.',
        ];

        // Return the response as JSON
        return response()->json($response);
    }



}
