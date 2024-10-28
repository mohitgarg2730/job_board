@extends('admin.layouts.app')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Form Elements</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Forms</li>
                    <li class="breadcrumb-item active">Plans</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">General Form Plans</h5>
                        
                            <?php if(!empty($c->id)){ ?>
                            <!-- General Form Elements -->
                            <form method="post" action="{{ route('admin.plan.update', $c->id) }}">
                            <?php } else { ?>
                                <form method="post" action="{{ route('admin.plan.store') }}">
                            <?php }?>
                        
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Plan Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="plan_name" 
                                           value="{{ !empty($c->plan_name) ? $c->plan_name : '' }}">
                                    @error('plan_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Price Monthly</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="price_monthly" 
                                           value="{{ !empty($c->price_monthly) ? $c->price_monthly : '' }}">
                                    @error('price_monthly')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Price Annually</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="price_annualy" 
                                           value="{{ !empty($c->price_annualy) ? $c->price_annualy : '' }}">
                                    @error('price_annualy')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Duration in Month</label>
                                <div class="col-sm-10">
                                    <input type="number" name="duration_in_month" class="form-control" 
                                           value="{{ !empty($c->duration_in_month) ? $c->duration_in_month : '' }}">
                                    @error('duration_in_month')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Duration in Years</label>
                                <div class="col-sm-10">
                                    <input type="number" name="duration_in_years" class="form-control" 
                                           value="{{ !empty($c->duration_in_years) ? $c->duration_in_years : '' }}">
                                    @error('duration_in_years')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Number of Jobs</label>
                                <div class="col-sm-10">
                                    <input type="number" name="number_of_jobs" class="form-control" 
                                           value="{{ !empty($c->number_of_jobs) ? $c->number_of_jobs : '' }}">
                                    @error('number_of_jobs')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        
                            <!-- New Fields Matching Pricing Plans -->
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Job Posts Active Days</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="job_posts_active_days"
                                           value="{{ !empty($c->job_posts_active_days) ? $c->job_posts_active_days : '' }}">
                                    @error('job_posts_active_days')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Featured Job Days</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="featured_job_days"
                                           value="{{ !empty($c->featured_job_days) ? $c->featured_job_days : '' }}">
                                    @error('featured_job_days')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Company Logo on Home Page</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="company_logo_on_home_page">
                                        <option value="1" {{ !empty($c->company_logo_on_home_page) && $c->company_logo_on_home_page == 1 ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ !empty($c->company_logo_on_home_page) && $c->company_logo_on_home_page == 0 ? 'selected' : '' }}>No</option>
                                    </select>
                                    @error('company_logo_on_home_page')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Resume Database Access</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="resume_database_access">
                                        <option value="1" {{ !empty($c->resume_database_access) && $c->resume_database_access == 1 ? 'selected' : '' }}>Yes</option>
                                        <option value="0" {{ !empty($c->resume_database_access) && $c->resume_database_access == 0 ? 'selected' : '' }}>No</option>
                                    </select>
                                    @error('resume_database_access')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Plan Description</label>
                                <div class="col-sm-10">
                                    <textarea id="editor1" name="content" class="summernote">
                                        {{ !empty($c->description) ? $c->description : '' }}
                                    </textarea>
                                    @error('editor1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        
                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        
                        </form>
                        
                    </div>

                </div>


            </div>
        </section>
    </main><!-- End #main -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            // Function to show/hide fields based on the selected type
            function toggleDurationFields() {
                var selectedType = $('#plan_duration_type').val();
                if (selectedType === 'monthly') {
                    $('#duration_in_month').show();
                    $('#duration_in_year').hide();
                } else if (selectedType === 'annual') {
                    $('#duration_in_month').hide();
                    $('#duration_in_year').show();
                }
            }

            // Initial call to set the correct fields on page load
            toggleDurationFields();

            // Call the function whenever the type changes
            $('#plan_duration_type').change(function() {
                toggleDurationFields();
            });
        });
    </script>
@endsection
