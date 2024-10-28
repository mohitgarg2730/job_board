<?php
use App\Models\Categeory;
use App\Models\JobType;
use App\Models\Qualification;
use App\Models\JobLevel;
use App\Models\JobExperince;
use App\Models\Skills;
use App\Models\Plans;

$cat = Categeory::get()->toArray();
$type = JobType::get()->toArray();
$qual = Qualification::get()->toArray();
$joblevel = JobLevel::get()->toArray();
$exp = JobExperince::get()->toArray();
$skill = Skills::get()->toArray();

?>

@extends('layouts.app')
@section('content')
<style>
    .progress-steps {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .progress-steps div {
        flex: 1;
        text-align: center;
        border-bottom: 2px solid lightgray;
        padding-bottom: 10px;
        color: gray;
    }

    .progress-steps .active {
        color: #007bff;
        border-color: #007bff;
    }

    .step {
        display: none;
        /* Hide all steps by default */
    }

    .step.active {
        display: block;
        /* Show the active step */
    }

    .form-container {
        margin-top: 40px;
    }

    .form-buttons {
        display: flex;
        justify-content: space-between;
    }
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="progress-steps">
                <div class="step-header" id="step1-header">Step 1: Job Details</div>
                <div class="step-header" id="step2-header">Step 2: Posting Type</div>
                <div class="step-header" id="step3-header">Step 3: Payment</div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route('gust.job.store') }}" method="POST" id="payment-form"
                        enctype="multipart/form-data">
                        @csrf

                        <!-- Step 1: Job Details -->
                        <div class="step active" id="step1">
                            <h4>Step 1: Job Details</h4>
                            <div class="form-container">

                                <!-- Job Title -->
                                <div class="form-group mb-3">
                                    <label>Job Title</label>
                                    <input type="text" class="form-control" name="job_title"
                                        value="{{ old('job_title') }}">
                                </div>

                                <!-- Job Description -->
                                <div class="form-group mb-3">
                                    <label>Job Description</label>
                                    <textarea class="form-control"
                                        name="job_description">{{ old('job_description') }}</textarea>
                                </div>

                                <!-- Email -->
                                <div class="form-group mb-3">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                        id="email_check">
                                    <div id="email-msg"> </div>
                                </div>
                                <!-- Email -->
                                <div class="form-group mb-3">
                                    <label>Phone number</label>
                                    <input type="text" class="form-control" name="phone_number" value="{{ old('phone_number') }}"
                                        id="phone_number">
                                    {{-- <div id="email-msg"> </div> --}}
                                </div>

                                <!-- Job Level -->
                                <div class="form-group mb-3">
                                    <label>Job Level</label>
                                    <select name="job_level_id" class="form-control">
                                        @foreach ($joblevel as $level)
                                        <option value="{{ $level['id'] }}" {{ old('job_level_id', $job->job_level_id ??
                                            '') == $level['id'] ? 'selected' : '' }}>
                                            {{ $level['name'] }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('job_level_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- Job Experience -->
                                <div class="form-group mb-3">
                                    <label>Job Experience</label>
                                    <select name="experience_id" class="form-control">
                                        @foreach ($exp as $experience)
                                        <option value="{{ $experience['id'] }}" {{ old('experience_id', $job->
                                            experience_id ?? '') == $experience['id'] ? 'selected' : '' }}>
                                            {{ $experience['name'] }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('experience_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- Job Qualification -->
                                <div class="form-group mb-3">
                                    <label>Job Qualification</label>
                                    <select name="qualification_id" class="form-control">
                                        @foreach ($qual as $qualification)
                                        <option value="{{ $qualification['id'] }}" {{ old('qualification_id', $job->
                                            qualification_id ?? '') == $qualification['id'] ? 'selected' : '' }}>
                                            {{ $qualification['name'] }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('qualification_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- Gender -->
                                <div class="form-group mb-3">
                                    <label>Gender</label>
                                    <select name="gender" class="form-control">
                                        <option value="Male" {{ old('gender', $job->gender ?? '') == 'Male' ? 'selected'
                                            : '' }}>Male</option>
                                        <option value="Female" {{ old('gender', $job->gender ?? '') == 'Female' ?
                                            'selected' : '' }}>Female</option>
                                        <option value="Other" {{ old('gender', $job->gender ?? '') == 'Other' ?
                                            'selected' : '' }}>Other</option>
                                    </select>
                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- Job Expiry Date -->
                                <div class="form-group mb-3">
                                    <label>Job Expiry Date</label>
                                    <input type="date" class="form-control" name="job_expiry_date"
                                        value="{{ old('job_expiry_date', $job->job_expiry_date ?? '') }}">
                                    @error('job_expiry_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- Job Fee Type -->
                                <div class="form-group mb-3">
                                    <label>Job Fee Type</label>
                                    <select name="job_fee_type_id" class="form-control">
                                        <option value="Normal" {{ old('job_fee_type_id')=='Normal' ? 'selected' : '' }}>
                                            Normal</option>
                                        <option value="Premium" {{ old('job_fee_type_id')=='Premium' ? 'selected' : ''
                                            }}>Premium</option>
                                        <option value="Urgent" {{ old('job_fee_type_id')=='Urgent' ? 'selected' : '' }}>
                                            Urgent</option>
                                    </select>
                                    @error('job_fee_type_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- Address -->
                                <div class="form-group mb-3">
                                    <label>Address</label>
                                    <input type="text" class="form-control" name="address"
                                        value="{{ old('address', $job->address ?? '') }}">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- Zip Code -->
                                <div class="form-group mb-3">
                                    <label>Zip Code</label>
                                    <input type="text" class="form-control" name="zip_code"
                                        value="{{ old('zip_code', $job->zip_code ?? '') }}">
                                    @error('zip_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- City -->
                                <div class="form-group mb-3">
                                    <label>City</label>
                                    <select name="city_id" class="form-control">
                                        <option value="Californië" {{ old('city_id', $job->city_id ?? '') ==
                                            'Californië' ? 'selected' : '' }}>Californië</option>
                                        <option value="Denver" {{ old('city_id', $job->city_id ?? '') == 'Denver' ?
                                            'selected' : '' }}>Denver</option>
                                    </select>
                                    @error('city_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- Country -->
                                <div class="form-group mb-3">
                                    <label>Country</label>
                                    <select name="country_id" class="form-control">
                                        <option value="India" {{ old('country_id', $job->country_id ?? '') == 'India' ?
                                            'selected' : '' }}>India</option>
                                        <option value="United States" {{ old('country_id', $job->country_id ?? '') ==
                                            'United States' ? 'selected' : '' }}>United States</option>
                                        <option value="United Kingdom" {{ old('country_id', $job->country_id ?? '') ==
                                            'United Kingdom' ? 'selected' : '' }}>United Kingdom</option>
                                    </select>
                                    @error('country_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                <div class="form-container">
                                    <!-- Category -->
                                    <div class="form-group mb-3">
                                        <label>Category</label>
                                        <select name="job_category_id" class="form-control">
                                            @foreach ($cat as $category)
                                            <option value="{{ $category['id'] }}" {{ old('job_category_id', $job->
                                                job_category_id ?? '') == $category['id'] ? 'selected' : '' }}>
                                                {{ $category['cat_name'] }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Job Type -->
                                    <div class="form-group mb-3">
                                        <label>Job Type</label>
                                        <select name="job_type_id" class="form-control">
                                            @foreach ($type as $jobType)
                                            <option value="{{ $jobType['id'] }}" {{ old('job_type_id', $job->job_type_id
                                                ??
                                                '') == $jobType['id'] ? 'selected' : '' }}>
                                                {{ $jobType['name'] }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Minimum Salary -->
                                    <div class="form-group mb-3">
                                        <label>Minimum Salary</label>
                                        <input type="number" class="form-control" name="min_salary"
                                            value="{{ old('min_salary') }}">
                                    </div>

                                    <!-- Maximum Salary -->
                                    <div class="form-group mb-3">
                                        <label>Maximum Salary</label>
                                        <input type="number" class="form-control" name="max_salary"
                                            value="{{ old('max_salary') }}">
                                    </div>

                                    <!-- Step Buttons -->
                                    <div class="form-buttons">
                                        <button type="button" class="btn btn-primary next">Next</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Step 2: Posting Type -->
                        <div class="step" id="step2">
                            <h4>Step 2: Posting Type</h4>
                            

                            {{-- // plans list start  --}}
                            {{-- // plans list start  --}}
                            <section>
                                <div class="custom-pack-sec">
                                    <div class="container">
                                        <h2 class="heading-title">Pricing Plans</h2>
                                        <div class="row gy-4">
                                            <ul class="nav nav-pills" style="justify-content: center">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-bs-toggle="pill" href="#menu1">Monthly</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="pill" href="#menu2">Yearly</a>
                                                </li>
                        
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane container fade active show" id="menu1">
                                                    <div class="row g-4">
                        
                                                        <?php
                        
                                                    $p = Plans::get();
                        
                                                     
                                                    foreach ($p as $key => $value) { ?>
                        
                                                        <div class="col-md-6 col-lg-4">
                                                            <div
                                                                class="pak-sec-inner 
                                                            
                                                            <?php
                                                            if ($key % 2 != 0) {
                                                                echo 'sec-bg-cover';
                                                            }
                                                            ?>  ">
                                                                {{-- <div class="sec-bg-cover"> --}}
                                                                <div class="flex-horizontal start-top">
                                                                    {{-- <img src="./img/pic1.png" class="icon-pricing---brix"> --}}
                                                                    <div>
                                                                        <p>For individuals</p>
                                                                        <h3>{{ $value['plan_name'] }}</h3>
                                                                    </div>
                                                                </div>
                                                                <div class="mg-top-18px mg-bottom-32px">
                                                                    {{-- <p>Lorem ipsum dolor sit amet doloroli sitiol conse ctetur adipiscing elit.</p> --}}
                                                                    <div class="pricing">$ {{ $value['price_monthly'] }}
                                                                        <span>{{ $value['duration_in_month'] }}/mo /user</span>
                                                                    </div>
                                                                    <h5>What’s included</h5>
                                                                    <ul>
                        
                        
                                                                        <li>
                                                                            <?php if($value['comopany_carrer_page'] == 'yes'){ ?>
                                                                            <i class="fa-solid fa-circle-check"></i>
                                                                            Company Career Pages
                                                                            <?php }else { ?>
                                                                            <i class="fa-solid fa-xmark"></i>
                                                                            Company Career Pages
                        
                                                                            <?php } ?>
                        
                        
                                                                        </li>
                                                                        {{-- ================================================================== --}}
                        
                                                                        <li>
                                                                            <?php if($value['no_of_jobs_standred_yes_no'] == 'yes'){ ?>
                                                                            <i class="fa-solid fa-circle-check"></i>
                                                                            {{ $value['number_of_jobs_standard'] }} Standard Job Post
                        
                                                                            <?php }else { ?>
                                                                            <i class="fa-solid fa-xmark"></i>
                                                                            0 Standard Job Post
                        
                                                                            <?php } ?>
                                                                        </li>
                                                                        {{-- ================================================================== --}}
                        
                                                                        <li>
                                                                            <?php if($value['job_post_or_live'] == 'yes'){ ?>
                                                                            <i class="fa-solid fa-circle-check"></i>
                                                                            Job posts are Live for {{ $value['job_post_or_live_no_of_days'] }} Days
                        
                                                                            <?php }else { ?>
                                                                            <i class="fa-solid fa-xmark"></i>
                                                                            Job posts are Live for 0 Days
                        
                                                                            <?php } ?>
                                                                        </li>
                                                                        {{-- ============================================================== --}}
                        
                                                                        <li>
                                                                            <?php if($value['job_alert_potential_clients'] == 'yes'){ ?>
                                                                            <i class="fa-solid fa-circle-check"></i>
                                                                            Job alerts to potential Clients
                                                                            <?php }else { ?>
                                                                            <i class="fa-solid fa-xmark"></i>
                                                                            Job alerts to potential Clients
                                                                            <?php } ?>
                        
                        
                                                                        </li>
                        
                                                                        {{-- ================================================= --}}
                                                                        <li>
                                                                            <?php if($value['distributed_google_jobs_network'] == 'yes'){ ?>
                                                                            <i class="fa-solid fa-circle-check"></i>
                                                                            Distributed Google Job Network
                                                                            <?php }else { ?>
                                                                            <i class="fa-solid fa-xmark"></i>
                                                                            Distributed Google Job Network
                                                                            <?php } ?>
                        
                        
                                                                        </li>
                                                                        {{-- ================================================= --}}
                                                                        <li>
                                                                            <?php if($value['featured_job_posts'] == 'yes'){ ?>
                                                                            <i class="fa-solid fa-circle-check"></i>
                                                                            Featured Job Post
                                                                            <?php }else { ?>
                                                                            <i class="fa-solid fa-xmark"></i>
                                                                            Featured Job Post
                                                                            <?php } ?>
                        
                        
                                                                        </li>
                                                                        {{-- ================================================= --}}
                                                                        <li>
                                                                            <?php if($value['social_media_sharing'] == 'yes'){ ?>
                                                                            <i class="fa-solid fa-circle-check"></i>
                                                                            Social Media Sharing
                                                                            <?php }else { ?>
                                                                            <i class="fa-solid fa-xmark"></i>
                                                                            Social Media Sharing
                                                                            <?php } ?>
                        
                        
                                                                        </li>
                                                                        {{-- ================================================= --}}
                                                                        <li>
                                                                            <?php if($value['company_logo_on_home_page'] == 'yes'){ ?>
                                                                            <i class="fa-solid fa-circle-check"></i>
                                                                            Company Logo on Home Page
                                                                            <?php }else { ?>
                                                                            <i class="fa-solid fa-xmark"></i>
                                                                            Company Logo on Home Page
                                                                            <?php } ?>
                        
                        
                                                                        </li>
                                                                        {{-- ================================================= --}}
                                                                        <li>
                                                                            <?php if($value['resume_database_access'] == 'yes'){ ?>
                                                                            <i class="fa-solid fa-circle-check"></i>
                                                                            Resume Database Access
                                                                            <?php }else { ?>
                                                                            <i class="fa-solid fa-xmark"></i>
                                                                            Resume Database Access
                                                                            <?php } ?>
                        
                        
                                                                        </li>
                        
                        
                        
                        
                        
                                                                    </ul>
                                                                </div>
                                                                <input type="radio" name="plan_id" value="{{$value['id']}}">
                                                            </div>
                                                        </div>
                        
                        
                                                        <?php } ?>
                        
                                                    </div>
                                                </div>
                                                <div class="tab-pane container fade" id="menu2">
                                                    <div class="row">
                        
                                                        <?php
                        
                                                    $p = Plans::get();
                                                    
                                                     
                                                    foreach ($p as $key => $value) { ?>
                                                        <div class="col-md-6 col-lg-4">
                                                            <div
                                                                class="pak-sec-inner    
                                                            <?php
                                                            if ($key % 2 != 0) {
                                                                echo 'sec-bg-cover';
                                                            }
                                                            ?>  ">
                                                                <div class="flex-horizontal start-top">
                                                                    {{-- <img src="./img/pic1.png" class="icon-pricing---brix"> --}}
                                                                    <div>
                                                                        <p>For individuals</p>
                                                                        <h3>{{ $value['plan_name'] }}</h3>
                                                                    </div>
                                                                </div>
                                                                <div class="mg-top-18px mg-bottom-32px">
                                                                    {{-- <p>Lorem ipsum dolor sit amet doloroli sitiol conse ctetur adipiscing elit.</p> --}}
                                                                    <div class="pricing">$ {{ $value['price_annualy'] }}
                                                                        <span>{{ $value['duration_in_years'] }}/yearly /user</span>
                                                                    </div>
                                                                    <h5>What’s included</h5>
                                                                    <ul>
                        
                        
                                                                        <li>
                                                                            <?php if($value['comopany_carrer_page'] == 'yes'){ ?>
                                                                            <i class="fa-solid fa-circle-check"></i>
                                                                            Company Career Pages
                                                                            <?php }else { ?>
                                                                            <i class="fa-solid fa-xmark"></i>
                                                                            Company Career Pages
                        
                                                                            <?php } ?>
                        
                        
                                                                        </li>
                                                                        {{-- ================================================================== --}}
                        
                                                                        <li>
                                                                            <?php if($value['no_of_jobs_standred_yes_no'] == 'yes'){ ?>
                                                                            <i class="fa-solid fa-circle-check"></i>
                                                                            {{ $value['number_of_jobs_standard'] }} Standard Job Post
                        
                                                                            <?php }else { ?>
                                                                            <i class="fa-solid fa-xmark"></i>
                                                                            0 Standard Job Post
                        
                                                                            <?php } ?>
                                                                        </li>
                                                                        {{-- ================================================================== --}}
                        
                                                                        <li>
                                                                            <?php if($value['job_post_or_live'] == 'yes'){ ?>
                                                                            <i class="fa-solid fa-circle-check"></i>
                                                                            Job posts are Live for {{ $value['job_post_or_live_no_of_days'] }} Days
                        
                                                                            <?php }else { ?>
                                                                            <i class="fa-solid fa-xmark"></i>
                                                                            Job posts are Live for 0 Days
                        
                                                                            <?php } ?>
                                                                        </li>
                                                                        {{-- ============================================================== --}}
                        
                                                                        <li>
                                                                            <?php if($value['job_alert_potential_clients'] == 'yes'){ ?>
                                                                            <i class="fa-solid fa-circle-check"></i>
                                                                            Job alerts to potential Clients
                                                                            <?php }else { ?>
                                                                            <i class="fa-solid fa-xmark"></i>
                                                                            Job alerts to potential Clients
                                                                            <?php } ?>
                        
                        
                                                                        </li>
                        
                                                                        {{-- ================================================= --}}
                                                                        <li>
                                                                            <?php if($value['distributed_google_jobs_network'] == 'yes'){ ?>
                                                                            <i class="fa-solid fa-circle-check"></i>
                                                                            Distributed Google Job Network
                                                                            <?php }else { ?>
                                                                            <i class="fa-solid fa-xmark"></i>
                                                                            Distributed Google Job Network
                                                                            <?php } ?>
                        
                        
                                                                        </li>
                                                                        {{-- ================================================= --}}
                                                                        <li>
                                                                            <?php if($value['featured_job_posts'] == 'yes'){ ?>
                                                                            <i class="fa-solid fa-circle-check"></i>
                                                                            Featured Job Post
                                                                            <?php }else { ?>
                                                                            <i class="fa-solid fa-xmark"></i>
                                                                            Featured Job Post
                                                                            <?php } ?>
                        
                        
                                                                        </li>
                                                                        {{-- ================================================= --}}
                                                                        <li>
                                                                            <?php if($value['social_media_sharing'] == 'yes'){ ?>
                                                                            <i class="fa-solid fa-circle-check"></i>
                                                                            Social Media Sharing
                                                                            <?php }else { ?>
                                                                            <i class="fa-solid fa-xmark"></i>
                                                                            Social Media Sharing
                                                                            <?php } ?>
                        
                        
                                                                        </li>
                                                                        {{-- ================================================= --}}
                                                                        <li>
                                                                            <?php if($value['company_logo_on_home_page'] == 'yes'){ ?>
                                                                            <i class="fa-solid fa-circle-check"></i>
                                                                            Company Logo on Home Page
                                                                            <?php }else { ?>
                                                                            <i class="fa-solid fa-xmark"></i>
                                                                            Company Logo on Home Page
                                                                            <?php } ?>
                        
                        
                                                                        </li>
                                                                        {{-- ================================================= --}}
                                                                        <li>
                                                                            <?php if($value['resume_database_access'] == 'yes'){ ?>
                                                                            <i class="fa-solid fa-circle-check"></i>
                                                                            Resume Database Access
                                                                            <?php }else { ?>
                                                                            <i class="fa-solid fa-xmark"></i>
                                                                            Resume Database Access
                                                                            <?php } ?>
                        
                        
                                                                        </li>
                        
                        
                        
                        
                        
                                                                    </ul>
                                                                </div>
                                                                <input type="radio" name="plan_id" value="{{$value['id']}}">
                                                            </div>
                                                        </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                        
                        
                                        </div>
                                    </div>
                                </div>
                            </section>
                            {{-- // plans list end  --}}
                             {{-- plans list --}}

                            <!-- Step Buttons -->
                            <div class="form-buttons">
                                <button type="button" class="btn btn-secondary prev">Previous</button>
                                <button type="button" class="btn btn-primary next">Next</button>
                            </div>
                        </div>

                        <!-- Step 3: Payment -->
                        <div class="step" id="step3">
                            <h4>Step 3: Payment</h4>
                            <div class="form-container">
                                <!-- Payment Gateway -->
                                <div class="form-group mb-3">
                                    <div id="card-element">
                                        <!-- Stripe Elements will go here -->
                                    </div>
                                </div>



                                <!-- Submit Button -->
                                <div class="form-buttons">
                                    <button type="button" class="btn btn-secondary prev">Previous</button>
                                    {{-- <button type="submit" class="btn btn-success">Submit</button> --}}
                                    <button type="button" class="btn btn-primary"
                                        onclick="submitPayment()">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Step Navigation
    const steps = document.querySelectorAll(".step");
    const nextButtons = document.querySelectorAll(".next");
    const prevButtons = document.querySelectorAll(".prev");
    const stepHeaders = document.querySelectorAll(".step-header");
    let currentStep = 0;

    function showStep(step) {
        steps.forEach((s, index) => {
            s.classList.toggle("active", index === step);
        });
        stepHeaders.forEach((header, index) => {
            header.classList.toggle("active", index === step);
        });
    }

    nextButtons.forEach(button => {
        button.addEventListener("click", () => {
            if (currentStep < steps.length - 1) {
                currentStep++;
                showStep(currentStep);
            }
        });
    });

    prevButtons.forEach(button => {
        button.addEventListener("click", () => {
            if (currentStep > 0) {
                currentStep--;
                showStep(currentStep);
            }
        });
    });

    showStep(currentStep);
</script>

<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe("{{ config('services.stripe.key') }}");
    var elements = stripe.elements();
    var card = elements.create('card');
    card.mount('#card-element');

    function submitPayment() {
        stripe.createToken(card).then(function(result) {
            if (result.error) {
                alert(result.error.message);
            } else {
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', result.token.id);
                form.appendChild(hiddenInput);
                form.submit();
            }
        });
    }
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- Email Check --}}
<script>
    $(document).ready(function(){
        $('#email_check').on('blur', function() {
            let formData = new FormData();
            formData.append('email', $(this).val());

            // Append the CSRF token
            formData.append('_token', '{{ csrf_token() }}');

            $.ajax({
                url: "{{ route('email.check') }}",  // replace with your route or URL
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#email-msg').empty();
                    if(response.email_exists) {
                        $('#email-msg').append(`<div class="email-success">${response.message}</div>`);
                    } else {
                        $('#email-msg').append(`<div class="email-error">${response.message}</div>`);
                    }
                },
                error: function(xhr) {
                    console.error(xhr.responseText);  // Handle error response
                }
            });
        });
    });
</script>

@endsection