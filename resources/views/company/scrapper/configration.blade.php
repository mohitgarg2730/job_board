@extends('company.layouts.afterlogin')

@section('content')
    <?php
    use App\Models\Categeory;
    use App\Models\JobType;
    use App\Models\Qualification;
    use App\Models\JobLevel;
    use App\Models\JobExperince;
    use App\Models\Skills;
    
    $cat = Categeory::get()->toArray();
    $type = JobType::get()->toArray();
    $qual = Qualification::get()->toArray();
    $joblevel = JobLevel::get()->toArray();
    $exp = JobExperince::get()->toArray();
    $skill = Skills::get()->toArray();
    
    ?>

    <style>
        .invalid-feedback {
            display: block !important;
        }
    </style>

    <div class="dashboard-content">
        <div class="dashboard-tlbar d-block mb-4">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <h1 class="mb-1 fs-3 fw-medium">Scrapper</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item text-muted"><a href="#">Scrapper</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="dashboard-widg-bar d-block">
            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <form action="{{route('company.job.config.save')}}" method="post">
                            @csrf
                            <!-- Previous Fields -->


                            <h5>Filter Jobs (optional)</h5>

                            <div class="mb-3 row">
                                <label for="filterKeywords" class="col-sm-2 col-form-label">Filter with Title</label>
                                <div class="col-sm-10">












                                    {{-- ======================================= --}}
                                    <div class="form-group">

                                        {{-- ======================================= --}}
                                        <select name="filter_with_title" class="">
                                            <option value="all">All</option>
                                            <?php
                                    // Extract only the job titles from the jobs array
                                    $jobTitles = array_column($jobs, 'title');

                                    // Make the titles unique
                                    $uniqueTitles = array_unique($jobTitles);
                                    foreach($uniqueTitles as $j){ ?>
                                            <option value="{{ $j }}">{{ $j }}</option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="filterKeywords" class="col-sm-2 col-form-label">Filter with Categeory</label>
                                <div class="col-sm-10">
                                    <div class="form-group">

                                        <select name="filter_with_cat" class="">
                                            <option value="all">All</option>
                                            <?php
                                        // Extract only the job titles from the jobs array
                                        $jobTitles = array_column($jobs, 'discipline');
    
                                        // Make the titles unique
                                        $uniqueTitles = array_unique($jobTitles);
                                        foreach($uniqueTitles as $j){ ?>
                                            <option value="{{ $j }}">{{ $j }}</option>

                                            <?php } ?>

                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="filterKeywords" class="col-sm-2 col-form-label">Filter with Location</label>
                                <div class="col-sm-10">
                                    <div class="form-group">

                                        <select name="filter_with_location" class="">
                                            <option value="all">All</option>
                                            <?php
                                        // Extract only the job titles from the jobs array
                                        $jobTitles = array_column($jobs, 'location');
    
                                        // Make the titles unique
                                        $uniqueTitles = array_unique($jobTitles);
                                        foreach($uniqueTitles as $j){ ?>
                                            <option value="{{ $j }}">{{ $j }}</option>

                                            <?php } ?>

                                        </select>

                                    </div>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="filterKeywords" class="col-sm-2 col-form-label">Filter with Employment Type</label>
                                <div class="col-sm-10">
                                    <div class="form-group">

                                        <select name="filter_with_employmentType" class="">
                                            <option value="all">All</option>
                                            <?php
                                        // Extract only the job titles from the jobs array
                                        $jobTitles = array_column($jobs, 'employmentType');
    
                                        // Make the titles unique
                                        $uniqueTitles = array_unique($jobTitles);
                                        foreach($uniqueTitles as $j){ ?>
                                            <option value="{{ $j }}">{{ $j }}</option>

                                            <?php } ?>

                                        </select>

                                    </div>
                                </div>
                            </div>




                            <div class="mb-3 row">
                                <div class="col-sm-10 offset-sm-2">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="py-3 text-center">© 2015 - 2023 Job Stock® Themezhub.</div>
            </div>
        </div>
    </div>

    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
@endsection
