<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CompanyProfileController extends Controller
{
    //
    public function profile()
    {
        $user = Auth::user();
        $user = User::find($user->id);


        return view('company.profile.index', ['user' => $user]);
    }
    public function update(Request $request)
    {
        try {
            $user = Auth::user();

            $data = $request->validate([
                'name' => 'required|string|max:255',
                // 'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
                // 'mobile' => 'required|string|max:20',
                'country' => 'required|string|max:100',
                'city' => 'required|string|max:100',
                'address' => 'required|string|max:255',
                'desc' => 'required|string|max:255',
                'twitter_profile_link' => 'required|url',
                'instagram_profile_link' => 'required|url',
                'linkedin_profile_link' => 'required|url',
                'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'category_id' => 'required',
                'company_size' => 'required',
                'established' => 'required',
                'company_service' => 'required',
            ]);

            $user->name = $request->name;
            // $user->email = $request->email;
            // $user->mobile = $request->mobile;
            $user->country = $request->country;
            $user->city = $request->city;
            $user->address = $request->address;
            $user->desc = $request->desc;
            $user->twitter_profile_link = $request->twitter_profile_link;
            $user->instagram_profile_link = $request->instagram_profile_link;
            $user->linkedin_profile_link = $request->linkedin_profile_link;
            $user->category_id = $request->category_id;
            $user->company_size = $request->company_size;
            $user->established = $request->established;
            $user->company_service = $request->company_service;
            $img = "";
            if ($request->hasFile('profile_picture')) {
                $profile_picture = time() . '_' . $data['profile_picture']->getClientOriginalName();
                $data['profile_picture']->move(public_path('profile_picture'), $profile_picture);
                $user->profile_picture  = 'profile_picture/' . $profile_picture;
                $img= asset('/').$user->profile_picture;
            }

            $user->save();
            // http://127.0.0.1:8000/profile_picture/1723391270_images.jpeg
            return response()->json(['id' => $user->id, 'message' => 'Profile updated successfully.','img'=>$img]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'errors' => $e->validator->errors()
            ], 422);
        }
    }

    // public function update(Request $request)
    // {


    //     $user = Auth::user();
    //     $data = $request->validate([
    //         'name' => 'required|string|max:255',
    //         // 'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
    //         // 'mobile' => 'required|string|max:20',
    //         'country' => 'required|string|max:100',
    //         'city' => 'required|string|max:100',
    //         'address' => 'nullable|string|max:255',
    //         'desc' => 'nullable|string|max:255',
    //         'twitter_profile_link' => 'nullable|url',
    //         'instagram_profile_link' => 'nullable|url',
    //         'linkedin_profile_link' => 'nullable|url',
    //         'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //         'category_id' => 'required',
    //         'company_size' => 'required',
    //         'established' => 'required',
    //         'company_service' => 'required',

    //     ]);



    //     $user->name = $request->name;
    //     // $user->email = $request->email;
    //     // $user->mobile = $request->mobile;
    //     $user->country = $request->country;
    //     $user->city = $request->city;
    //     $user->address = $request->address;
    //     $user->desc = $request->desc;
    //     $user->twitter_profile_link = $request->twitter_profile_link;
    //     $user->instagram_profile_link = $request->instagram_profile_link;
    //     $user->linkedin_profile_link = $request->linkedin_profile_link;

    //     $user->category_id = $request->category_id;
    //     $user->company_size = $request->company_size;
    //     $user->established = $request->established;
    //     $user->company_service = $request->company_service;

    //     if ($request->hasFile('profile_picture')) {

    //         $profile_picture = time() . '_' . $data['profile_picture']->getClientOriginalName();
    //          $data['profile_picture']->move(public_path('profile_picture'), $profile_picture);
    //         $user->profile_picture  = 'profile_picture/'.$profile_picture;

    //     }

    //     $user->save();
    //     return response()->json(['id' => $_POST]);

    //     // return redirect('company/profile')->with('message', 'Profile updated successfully.');
    // }
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

        return redirect('company/profile')->with('message', 'Profile updated successfully.');
    }
}
