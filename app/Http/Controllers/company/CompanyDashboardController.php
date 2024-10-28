<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\User;
use App\Models\Categeory;
use App\Models\Skills;
use App\Models\ApplyJobs;
use Illuminate\Support\Facades\Auth;


class CompanyDashboardController extends Controller
{
    //
    public function index()
    {
        return view('company.dashboard.index');

    }
    // public function profesinal_list(Request $request)
    // {

    //    $data =  $request->validate([
    //         'candidates' => "required",
    //    ]);
    //     $user = Auth::user();
    //     $apjob = ApplyJobs::where('company_id',$user['id'])->get();
    //     $apjob->profesinal_list = 0;
    //     $apjob->save();
     
    //    foreach($data['candidates'] as $d)
    //    {
    //     $apjob = ApplyJobs::where('company_id',$user['id'])->where('id',$d)->first();
    //     $apjob->profesinal_list = 1;
    //     $apjob->save();

    //    }


    //     // $apjob = ApplyJobs::where('company_id',$user['id'])->where('id',$id)->first();
    //     // $apjob->short_list = $s;
    //     // $apjob->save();
    //     // return redirect()->back()->with('s', 'updated successfully.');

    // }
    public function profesinal_list(Request $request)
    {

        
        $user = Auth::user();

         // Fetch all job applications for the company
         $apjobs = ApplyJobs::where('company_id', $user->id)->get();
    
         // Set 'profesinal_list' to 0 for all job applications of the company
         foreach ($apjobs as $apjob) {
             $apjob->profesinal_list = 0;
             $apjob->save();
         }


         
        // Validate the request data
        $data = $request->validate([
            'candidates' => "", // Ensure it's an array
            'candidates.*' => "" // Validate each candidate ID exists
        ]);
    
    if(!empty($data['candidates']))
    {
        // Fetch all job applications for the company
        $apjobs = ApplyJobs::where('company_id', $user->id)->get();
    
        // Set 'profesinal_list' to 0 for all job applications of the company
        foreach ($apjobs as $apjob) {
            $apjob->profesinal_list = 0;
            $apjob->save();
        }
    
        // Update 'profesinal_list' to 1 for the selected candidates
        foreach ($data['candidates'] as $candidateId) {
            $apjob = ApplyJobs::where('company_id', $user->id)
                              ->where('id', $candidateId)
                              ->first();
                              
            if ($apjob) {
                $apjob->profesinal_list = 1;
                $apjob->save();
            }
        }
    }
        return true;
        // Optionally, return a response or redirect
    }
    

    public function joblisting(Request $request)
    {
        // Retrieve categories
        $categories = Categeory::all();

        // Build the query
        $jobsQuery = Job::select('jobs.*', 'users.profile_picture as profile', 'users.country', 'users.city')
            ->join('users', 'jobs.user_id', '=', 'users.id')
            ->with('cat')
            ->where('approved_by_admin',1)
            ->orderby('mark_a_featured','Desc');

        // Filter by category if provided
        if ($request->filled('cat')) {

            if( $request->input('cat') != 0)
            {
                $jobsQuery->where('job_category_id', $request->input('cat'));

            }

        }
        if ($request->filled('job_level')) {

            if( $request->input('job_level') != 0)
            {
                $jobsQuery->where('job_level_id', $request->input('job_level'));

            }

        }


        // Filter by category if provided
        if ($request->filled('title')) {
            $jobsQuery->where('job_title', 'like', '%' . $request->input('title') . '%');
        }

        // Filter by category if provided
        if ($request->filled('qual')) {
            $qualifications = $request->input('qual');
            $jobsQuery->whereIn('qualification_id', $qualifications);


            // $jobsQuery->where(function ($query) use ($qualifications) {
            //     foreach ($qualifications as $qual) {
            //         $query->orWhere('qualification_id', $qual);
            //     }
            // });
        }
        if ($request->filled('skills')) {
            $skills = $request->input('skills'); // array

            $jobsQuery->where(function ($query) use ($skills) {
                foreach ($skills as $skill) {
                    $query->orWhere('jobs.skills', 'LIKE', '%' . $skill . '%');
                }
            });
        }
        $paginate = 10;
        if ($request->filled('total_number')) {

            $paginate = (int) $request->input('total_number');
        }



        // Paginate the results
        $jobs = $jobsQuery->paginate($paginate);


        // Return the view with the jobs and categories data
        return view('frontend.jobs.list', [
            'jobs' => $jobs,
            'cat' => $categories,
            'total_jobs' =>Job::where('approved_by_admin',1)->count()
        ]);
    }

    public function applied_jobs()
    {
        return view('company.dashboard.pages.appliedjobs');
    }
    public function short_list_candidate()
    {
        return view('company.dashboard.pages.short_list_candidate');
    }
    public function profesional_list_candidate()
    {
        return view('company.dashboard.pages.profesional_list_candidate');
    }

    public function package()
    {
        return view('company.dashboard.pages.package');
    }
    public function delete_account()
    {
        return view('company.dashboard.pages.delete_account');
    }


    public function short_list_status_update($id,$s)
    {
        $user = Auth::user();
        $apjob = ApplyJobs::where('company_id',$user['id'])->where('id',$id)->first();
        $apjob->short_list = $s;
        $apjob->save();
        return redirect()->back()->with('s', 'updated successfully.');

    }


}
