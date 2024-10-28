@extends('layouts.candidate')

@section('content')
<?php
use App\Models\ApplyJobs;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use App\Models\Skills;
use App\Models\Categeory;
use App\Models\JobType;
use App\Models\Qualification;
use App\Models\JobLevel;
use App\Models\JobExperince;

$job_level = JobLevel::get();
$exp = JobExperince::get();

$user = Auth::user();
$apjobcount = ApplyJobs::where('applied_by',$user['id'])->count();
$totalJobs = Job::count();
$jobs = Job::take(10)->orderby('id','Desc')->get();

?>
<div class="dashboard-content">
	<div class="dashboard-tlbar d-block mb-5">
		<div class="row">
			<div class="colxl-12 col-lg-12 col-md-12">
				<h1 class="mb-1 fs-3 fw-medium">Candidate Dashboard</h1>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item text-muted"><a href="#">Candidate</a></li>
						<li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="#" class="text-primary">Candidate Statistics</a></li>
					</ol>
				</nav>
			</div>
		</div>
	</div>

	<div class="dashboard-widg-bar d-block">

		<!-- Row Start -->
		<div class="row align-items-center gx-4 gy-4 mb-4">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
				<div class="dash-wrap-bloud">
					<div class="dash-wrap-bloud-icon">
						<div class="bloud-icon text-success bg-light-success">
							<i class="fa-solid fa-business-time"></i>
						</div>
					</div>
					<div class="dash-wrap-bloud-caption">
						<div class="dash-wrap-bloud-content">
							<h5 class="ctr">{{ $totalJobs }}</h5>
							<p>Total Applyied</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
				<div class="dash-wrap-bloud">
					<div class="dash-wrap-bloud-icon">
						<div class="bloud-icon text-warning bg-light-warning">
							<i class="fa-solid fa-bookmark"></i>
						</div>
					</div>
					<div class="dash-wrap-bloud-caption">
						<div class="dash-wrap-bloud-content">
							<h5 class="ctr">{{ $apjobcount }}</h5>
							<p>Total Applyied</p>
						</div>
					</div>
				</div>
			</div>

		</div>
		<!-- Row End -->

		<!-- Row Start -->
		{{-- <div class="row gx-4 gy-4 mb-4">
			<div class="col-xl-8 col-lg-12 col-md-12 col-sm-12">
				<div class="card d-none d-lg-block">
					<div class="card-header">
						<h4 class="mb-0">Extra gebiedsgrafiek</h4>
					</div>
					<div class="card-body">
						<ul class="list-inline text-center m-t-40">
							<li>
								<h5><i class="fa fa-circle me-1 text-warning"></i>Toegepaste banen</h5>
							</li>
							<li>
								<h5><i class="fa fa-circle me-1 text-danger"></i>Vacatures bekeken</h5>
							</li>
							<li>
								<h5><i class="fa fa-circle me-1 text-success"></i>Opgeslagen banen</h5>
							</li>
						</ul>
						<div class="chart" id="line-chart" style="height:300px;"></div>
					</div>
				</div>
			</div>

			<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h4>Meldingen</h4>
					</div>
					<div class="ground-list ground-list-hove">
						<div class="ground ground-single-list">
							<a href="JavaScript:Void(0);">
								<div class="btn-circle-40 text-warning bg-light-warning"><i class="fas fa-home"></i>
								</div>
							</a>

							<div class="ground-content">
								<h6><a href="JavaScript:Void(0);"><strong>Kr. Shaury Preet</strong> Heeft uw bericht beantwoord</a></h6>
								<span class="small">Net nu</span>
							</div>
						</div>

						<div class="ground ground-single-list">
							<a href="JavaScript:Void(0);">
								<div class="btn-circle-40 text-danger bg-light-danger"><i
										class="fa-solid fa-comments"></i></div>
							</a>

							<div class="ground-content">
								<h6><a href="JavaScript:Void(0);">Mortin Denver heeft je cv geaccepteerd op<strong>Baanvoorraad</strong></a></h6>
								<span class="small">20 minuten geleden</span>
							</div>
						</div>

						<div class="ground ground-single-list">
							<a href="JavaScript:Void(0);">
								<div class="btn-circle-40 text-info bg-light-info"><i class="fa-solid fa-heart"></i>
								</div>
							</a>

							<div class="ground-content">
								<h6><a href="JavaScript:Void(0);">Uw vacature #456256 is gisteren verlopen <strong>Bekijk meer</strong></a></h6>
								<span class="small">1 dag geleden</span>
							</div>
						</div>

						<div class="ground ground-single-list">
							<a href="JavaScript:Void(0);">
								<div class="btn-circle-40 text-danger bg-light-danger"><i
										class="fa-solid fa-thumbs-up"></i></div>
							</a>

							<div class="ground-content">
								<h6><a href="JavaScript:Void(0);"><strong>Daniel Kurwa</strong> heeft je cv goedgekeurd!.Daniel Kurwa</strong> has been approved your resume!.</a></h6>
								<span class="small">10 days geleden</span>
							</div>
						</div>

						<div class="ground ground-single-list">
							<a href="JavaScript:Void(0);">
								<div class="btn-circle-40 text-success bg-light-success"><i
										class="fa-solid fa-comment-dots"></i></div>
							</a>

							<div class="ground-content">
								<h6><a href="JavaScript:Void(0);">Khushi Verma heeft een recensie achtergelaten op <strong>Your Bericht</strong></a></h6>
								<span class="small">Net nu</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> --}}
		<!-- Row End -->

		<!-- Row Start -->
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
				<div class="card">
					<div class="card-header">
						<h4 class="mb-0">Shortlisted vacancies</h4>
					</div>
					<div class="card-body px-4 py-4">
						<!-- Start All List -->
						<div class="row justify-content-start gx-3 gy-4">

                            <div class="row justify-content-start gx-3 gy-4">

                                <?php if (count($jobs) > 0): ?>
                                <!-- Single Item -->
                                <?php foreach ($jobs as $key => $result): ?>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                                    <div class="emplors-list-box border">
                                        <div class="emplors-list-head mb-0">
                                            <div class="emplors-list-head-thunner">
                                                <div class="emplors-list-emp-thumb">
                                                    <a href="#">
                                                        <figure>
                                                            <img src="{{ asset('/') }}{{ $result->company_logo }}"
                                                                class="img-fluid" alt="">
                                                        </figure>
                                                    </a>
                                                </div>
                                                <div class="emplors-list-job-caption">
                                                    <div class="emplors-job-title-wrap mb-1">
                                                        <h4>
                                                            <a href="{{ url('job-detail', $result->id) }}"
                                                                class="emplors-job-title">{{ $result->job_title }}</a>
                                                        </h4>
                                                    </div>
                                                    <div class="emplors-job-mrch-lists">
                                                        <div class="single-mrch-lists">
                                                            <?php
                                                                $skillIds = explode(',', $result->skills);
                                                                $skillss = Skills::whereIn('id', $skillIds)->get();
                                                                foreach ($skillss as $skill): ?>
                                                            <span>{{ $skill->name }}</span>
                                                            <?php endforeach; ?>
                                                        </div>
                                                        <div class="single-mrch-lists">
                                                            <span>{{ !empty($result->cat->cat_name) ?
                                                                ucfirst($result->cat->cat_name) : '' }}</span>
                                                        </div>
                                                        <div class="single-mrch-lists">
                                                            <span><i class="fa-solid fa-location-dot me-1"></i>{{
                                                                $result->address }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="emplors-list-head-last">
												<a href="{{ url('company-detail', [base64_encode($result->user_id), $result->name]) }}"
													class="btn btn-md btn-light-primary px-3">View Company</a>
												 
                                                <a href="{{ url('job-detail', $result->id) }}"
                                                    class="btn btn-md btn-light-primary px-3">Apply</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                             
                                <?php else: ?>
                                <!-- No Data Found -->
                                <div class="col-12 text-center">
                                    <p>No data found</p>
                                </div>
                                <?php endif; ?>

                            </div>


						</div>
						<!-- End All Job List -->
					</div>
				</div>
			</div>
		</div>
		<!-- Row End -->

	</div>
@endsection
