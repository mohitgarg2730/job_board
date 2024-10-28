<?php

namespace App\Http\Controllers\candidate;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class CandidateDashbaord extends Controller
{
    //

    public function index()
    {
        $user = Auth::user();
        $user = User::find($user->id);

        return view('frontend.dashbaord', ['user' => $user]);

    }


    public function applied_jobs()
    {
        return view('frontend.dashboard.pages.appliedjobs');
    }
    public function alert_jobs()
    {
        return view('frontend.dashboard.pages.alert_jobs');
    }
    public function short_list_candidate()
    {
        return view('frontend.dashboard.pages.short_list_candidate');
    }

    public function package()
    {
        return view('frontend.dashboard.pages.package');
    }
    public function delete_account()
    {
        return view('frontend.dashboard.pages.delete_account');
    }
}
