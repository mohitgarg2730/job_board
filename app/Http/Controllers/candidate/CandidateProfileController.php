<?php

namespace App\Http\Controllers\candidate;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CandidateProfileController extends Controller
{
    //

    public function profile()
    {
        $user = Auth::user();
        $user = User::find($user->id);
        return view('frontend.profile.candidate', ['user' => $user]);
    }
    public function applied_jobs()
    {
        $user = Auth::user();
        $user = User::find($user->id);
        return view('frontend.profile.applied-job', ['user' => $user]);
    }
    public function alert_jobs()
    {
        $user = Auth::user();
        $user = User::find($user->id);
        return view('frontend.profile.alert-jobs', ['user' => $user]);
    }
    public function shortlist_jobs()
    {
        $user = Auth::user();
        $user = User::find($user->id);
        return view('frontend.profile.shortlist-jobs', ['user' => $user]);
    }
    public function follow_empoloyer()
    {
        $user = Auth::user();
        $user = User::find($user->id);
        return view('frontend.profile.follow-empoloyer', ['user' => $user]);
    }
    public function message()
    {
        $user = Auth::user();
        $user = User::find($user->id);
        return view('frontend.profile.message', ['user' => $user]);
    }
    public function update(Request $request)
    {

        $user = Auth::user();

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'mobile' => 'required|string|max:20',
            'work_status' => ['required', 'string'],
            'resume' => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:2048'],
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'skills' => '',
        ]);


        if ($request->hasFile('resume')) {

            $resumeName = time() . '_' . $data['resume']->getClientOriginalName();
            $data['resume']->move(public_path('resume'), $resumeName);

            $user->resume = 'resume/'.$resumeName;




        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->work_status = $request->work_status;
        if(!empty($data['skills']))
        {
            $user->skills = json_encode($data['skills']);
        }
        if ($request->hasFile('profile_picture')) {

            $profile_picture = time() . '_' . $data['profile_picture']->getClientOriginalName();
             $data['profile_picture']->move(public_path('profile_picture'), $profile_picture);
            $user->profile_picture  = 'profile_picture/'.$profile_picture;

        }

        $user->save();

        return redirect('candidate/profile')->with('s', 'Profile updated successfully.');
    }
    public function changePassword(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'current_password' => 'required|string|min:8',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if (Hash::check($request->current_password, $user->password)) {
            $user->password = Hash::make($request->new_password);
        } else {
            return redirect()->route('profile.show')->withErrors(['current_password' => 'Current password is incorrect']);
        }

        $user->save();

        return redirect('candidate/profile')->with('s', 'Profile updated successfully.');
    }
}
