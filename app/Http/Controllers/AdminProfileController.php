<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    //
    public function index()
    {

        $user = Auth::user();
        $user = User::find($user->id);


        return view('admin.myaccount.profile', ['user' => $user]);
    }



    public function update(Request $request)
    {

        try {
            $user = Auth::user();

            $data = $request->validate([
                'name' => 'required|string|max:255',

                'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ]);

            $user->name = $request->name;
            // $user->email = $request->email;
            // $user->mobile = $request->mobile;

            $img = "";
            if ($request->hasFile('profile_picture')) {
                $profile_picture = time() . '_' . $data['profile_picture']->getClientOriginalName();
                $data['profile_picture']->move(public_path('profile_picture'), $profile_picture);
                $user->profile_picture  = 'profile_picture/' . $profile_picture;
                $img= asset('/').$user->profile_picture;
            }

            $user->save();
            return redirect('admin/profile')->with('s','updated successfully');;

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect('admin/profile')->with('e','Sonr thing went wrong');;

        }
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
            return redirect('admin/profile')->with('e','Current password is incorrect');

        }

        $user->save();

        return redirect('admin/profile')->with('s','updated successfully');;
    }
}
