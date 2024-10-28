<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ApplyJobs;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use App\Mail\JobApplicationMail;
use Illuminate\Support\Facades\Mail;

class ApplyJobController extends Controller
{
    //
    public function apply_jobs($job_id)
    {
        $user_id = 0;

        $ap = new ApplyJobs;

        if (Auth::check()) {
            $user = Auth::user();
            Mail::to(Auth::user()->email)->send(new JobApplicationMail());

            $userr = User::where('role', 'employee')->where('id', $user['id'])->first();
            if (!empty($userr)) {
                $user_id = $userr->id;

                $ap->name = $userr->name;
                $ap->email = $userr->email;
                $ap->mobile = $userr->mobile;
                $ap->resume = $userr->resume;



            }

        }
        $jo = Job::where('id', $job_id)->first();
        $ap->company_id = $jo->user_id;
        $ap->job_id = $job_id;
        $ap->applied_by = $user_id;
        $ap->save();


        return redirect('job-detail/' . $job_id)->with('s', 'job applied');



    }
    public function jobs_applied_form(Request $request, $job_id)
    {
       
        $data = $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255',],
                // 'resume' => ['required', 'file', 'mimes:pdf,doc,docx', 'max:2048'],
                'resume' => 'required|mimes:pdf,doc,docx|max:2048', // Only PDF, DOC, DOCX files allowed
                'mobile' => ['required', 'string', 'max:10'],

            ]
        );
   
        if ($request->hasFile('resume')) {

            $resume = time() . '_' . $data['resume']->getClientOriginalName();
            $data['resume']->move(public_path('resume'), $resume);
            $data['resume'] = 'resumes/' . $resume;

        }
      

        $user_id = 0;

        $ap = new ApplyJobs;

        if (Auth::check()) {
            $user = Auth::user();
            $userr = User::where('role', 'employee')->where('id', $user['id'])->first();
            if (!empty($userr)) {
                $user_id = $userr->id;

                $ap->name = $userr->name;
                $ap->email = $userr->email;
                $ap->mobile = $userr->mobile;
                $ap->resume = $userr->resume;

            }

        } else {
            $ap->name = $data['name'];
            $ap->email = $data['email'];
            $ap->mobile = $data['mobile'];
            $ap->resume = $data['resume'];

        }
        $ap->job_id = $job_id;
        $jo = Job::where('id', $job_id)->first();

        $ap->company_id = $jo->user_id;

        $ap->applied_by = $user_id;


        $ap->save();
        Mail::to($ap->email)->send(new JobApplicationMail());



        return redirect('job-detail/' . $job_id)->with('s', 'job applied');



    }
}
