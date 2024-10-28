<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plans;

class PlanController extends Controller
{
    //
    public function index()
    {
        return view('admin.plan.form');
    }
    public function edit($id)
    {
        $p = Plans::find($id);


        return view('admin.plan.form', ['c' => $p]);
    }
    public function del($id)
    {
        $p = Plans::find($id)->delete();


        return redirect('admin/plan/list')->with('s', 'Plans Deleted');
    }
    public function store(Request $request)
    {




        $data = $request->validate([
            'plan_name' => "required",
            'price_monthly' => "required",
            'price_annualy' => "required",
            'duration_in_month' => "required",
            'duration_in_years' => "required",
            'no_of_jobs_standred_yes_no' => "required",
            'number_of_jobs_standard' => "required",
            'comopany_carrer_page' => "required",
            'job_post_or_live' => "required",
            'job_post_or_live_no_of_days' => "required",
            'job_alert_potential_clients' => "required",
            'distributed_google_jobs_network' => "required",
            'featured_job_posts' => "required",
            'social_media_sharing' => "required",
            'company_logo_on_home_page' => "required",
            'resume_database_access' => "required",
        ]);
        $p = new Plans;
        $p->plan_name = $data['plan_name'];
        $p->price_monthly = $data['price_monthly'];
        $p->price_annualy = $data['price_annualy'];
        $p->duration_in_month = $data['duration_in_month'];
        $p->duration_in_years = $data['duration_in_years'];
        $p->no_of_jobs_standred_yes_no = $data['no_of_jobs_standred_yes_no'];
        $p->number_of_jobs_standard = $data['number_of_jobs_standard'];
        $p->comopany_carrer_page = $data['comopany_carrer_page'];
        $p->job_post_or_live = $data['job_post_or_live'];
        $p->job_post_or_live_no_of_days = $data['job_post_or_live_no_of_days'];
        $p->job_alert_potential_clients = $data['job_alert_potential_clients'];
        $p->distributed_google_jobs_network = $data['distributed_google_jobs_network'];
        $p->featured_job_posts = $data['featured_job_posts'];
        $p->social_media_sharing = $data['social_media_sharing'];
        $p->company_logo_on_home_page = $data['company_logo_on_home_page'];
        $p->resume_database_access = $data['resume_database_access'];


        $p->save();

        return redirect('admin/plan/list')->with('s', 'Plans Added');

        // return view('admin.plan.form');
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'plan_name' => "required",
            'price_monthly' => "required",
            'price_annualy' => "required",
            'duration_in_month' => "required",
            'duration_in_years' => "required",
            'no_of_jobs_standred_yes_no' => "required",
            'number_of_jobs_standard' => "required",
            'comopany_carrer_page' => "required",
            'job_post_or_live' => "required",
            'job_post_or_live_no_of_days' => "required",
            'job_alert_potential_clients' => "required",
            'distributed_google_jobs_network' => "required",
            'featured_job_posts' => "required",
            'social_media_sharing' => "required",
            'company_logo_on_home_page' => "required",
            'resume_database_access' => "required",
        ]);
        $p = Plans::find($id);
        $p->plan_name = $data['plan_name'];
        $p->price_monthly = $data['price_monthly'];
        $p->price_annualy = $data['price_annualy'];
        $p->duration_in_month = $data['duration_in_month'];
        $p->duration_in_years = $data['duration_in_years'];
        $p->no_of_jobs_standred_yes_no = $data['no_of_jobs_standred_yes_no'];
        $p->number_of_jobs_standard = $data['number_of_jobs_standard'];
        $p->comopany_carrer_page = $data['comopany_carrer_page'];
        $p->job_post_or_live = $data['job_post_or_live'];
        $p->job_post_or_live_no_of_days = $data['job_post_or_live_no_of_days'];
        $p->job_alert_potential_clients = $data['job_alert_potential_clients'];
        $p->distributed_google_jobs_network = $data['distributed_google_jobs_network'];
        $p->featured_job_posts = $data['featured_job_posts'];
        $p->social_media_sharing = $data['social_media_sharing'];
        $p->company_logo_on_home_page = $data['company_logo_on_home_page'];
        $p->resume_database_access = $data['resume_database_access'];


        $p->save();
        return redirect('admin/plan/list')->with('s', 'Plans updated');
    }
    public function list()
    {
        $p = Plans::orderby('plan_name')->get();

        return view('admin.plan.list', ['p' => $p]);
    }
}
