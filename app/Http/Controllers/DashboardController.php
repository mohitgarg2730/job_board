<?php

namespace App\Http\Controllers;
use App\Models\contacts;
use App\Models\User;
use App\Models\Job;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        // return view('admin.dashboard.indexnew');
        return view('admin.dashboard.index');
    }
    public function contact_store(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:contacts,email',
            'subject' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string',
        ]);
        contacts::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'subject' => $validatedData['subject'],
            'phone' => $validatedData['phone'],
            'message' => $validatedData['message'],
        ]);
        return redirect()->back()->with('success', 'successfully!');
    }

    public function companyList()
    {
        $c = User::where('role','company')->orderby('name')->paginate();

        return view('admin.company.list',['c'=>$c]);
    }
    public function JobList()
    {
        $c = Job::with('user')->where('user_id','!=',0)->orderby('job_title')->paginate(10);

        return view('admin.job.list',['c'=>$c]);
    }

    public function candidate_list()
    {
        // Candidate list

            $c = User::where('role','employee')->orderby('name')->paginate(10);

            return view('admin.candidate.list',['c'=>$c]);

    }
    public function gustJobList()
    {
        $c = Job::with('user')->where('user_id',0)->orderby('job_title')->paginate(10);

        return view('admin.gustJob.list',['c'=>$c]);
    }

    public function jobstatus($id,$status)
    {
        $j = job::find($id);
        $j->approved_by_admin = 1;
        $j->save();

        return redirect()->back()->with('s','updated successfully');;
    }
}
