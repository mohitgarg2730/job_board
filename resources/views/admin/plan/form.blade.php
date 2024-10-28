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

                            <?php if (!empty($c->id)) { ?>
                            <!-- General Form Elements -->
                            <form method="post" action="{{ route('admin.plan.update', $c->id) }}">
                                <?php } else { ?>
                                <form method="post" action="{{ route('admin.plan.store') }}">
                                    <?php } ?>

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
                                                value="{{ !empty($c->price_monthly) ? $c->price_monthly : '0' }}">
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
                                                value="{{ !empty($c->price_annualy) ? $c->price_annualy : '0' }}">
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
                                                value="{{ !empty($c->duration_in_month) ? $c->duration_in_month : '0' }}">
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
                                                value="{{ !empty($c->duration_in_years) ? $c->duration_in_years : '0' }}">
                                            @error('duration_in_years')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <!-- New Fields Matching Pricing Plans -->

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Number of Jobs Standard (Enable/Disabled)</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="no_of_jobs_standred_yes_no">
                                                <option value="yes" {{ !empty($c->no_of_jobs_standred_yes_no) && $c->no_of_jobs_standred_yes_no == 'yes' ? 'selected' : '' }}>Yes</option>
                                                <option value="no" {{ !empty($c->no_of_jobs_standred_yes_no) && $c->no_of_jobs_standred_yes_no == 'no' ? 'selected' : '' }}     {{ !empty($c->no_of_jobs_standred_yes_no) && !empty($c->no_of_jobs_standred_yes_no) ? '' : 'selected' }}        >No</option>
                                            </select>
                                            @error('no_of_jobs_standred_yes_no')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    {{-- ========================== --}}
                                    <div class="row mb-3" id="number_of_jobs_standard_input" style="display: {{ !empty($c->no_of_jobs_standred_yes_no) && $c->no_of_jobs_standred_yes_no == 'yes' ? '' : 'none' }};">
                                        <label for="inputText" class="col-sm-2 col-form-label">Number of Jobs
                                            Standard</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="number_of_jobs_standard" class="form-control"
                                                value="{{ !empty($c->number_of_jobs_standard) ? $c->number_of_jobs_standard : '0' }}">
                                            @error('number_of_jobs_standard')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{-- =============================== --}}
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Company Career Page
                                            (Enable/Disabled)</label>
                                        <div class="col-sm-10">

                                            <select class="form-control" name="comopany_carrer_page">
                                                
                                                <option value="yes" {{ !empty($c->comopany_carrer_page) && $c->comopany_carrer_page == 'yes' ? 'selected' : '' }}  {{ !empty($c->comopany_carrer_page) && !empty($c->comopany_carrer_page) ? '' : 'selected' }} >Yes</option>
                                                <option value="no" {{ !empty($c->comopany_carrer_page) && $c->comopany_carrer_page == 'no' ? 'selected' : '' }}>No</option>


                                            </select>
                                            @error('comopany_carrer_page')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Job Posts Are Live no
                                            (Enable/Disabled)
                                        </label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="job_post_or_live">
                                                
                                                <option value="yes" {{ !empty($c->job_post_or_live) && $c->job_post_or_live == 'yes' ? 'selected' : '' }}  >Yes</option>
                                                <option value="no" {{ !empty($c->job_post_or_live) && $c->job_post_or_live == 'no' ? 'selected' : '' }}     {{ !empty($c->job_post_or_live) && !empty($c->job_post_or_live) ? '' : 'selected' }}        >No</option>

                                            </select>
                                            @error('job_post_or_live')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3" style="display: {{ !empty($c->job_post_or_live) && !empty($c->job_post_or_live) ? '' : 'none' }}  " id="job_post_or_live_no_of_days"     >
                                        <label for="inputText" class="col-sm-2 col-form-label">Job Posts Are Live no of
                                            Days</label>
                                        <div class="col-sm-10">
                                            <input type="number" name="job_post_or_live_no_of_days"
                                                 class="form-control"
                                                value="{{ !empty($c->job_post_or_live_no_of_days) ? $c->job_post_or_live_no_of_days : '0' }}">
                                            @error('job_post_or_live_no_of_days')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- ================== -->
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label"> Job Alert Sent to
                                            Potential Candidates</label>
                                        <!-- YYES/no  -->
                                        <div class="col-sm-10">
                                            <select class="form-control" name="job_alert_potential_clients">
                                                
                                                    
                                                <option value="yes" {{ !empty($c->job_alert_potential_clients) && $c->job_alert_potential_clients == 'yes' ? 'selected' : '' }}  {{ !empty($c->job_alert_potential_clients) ? '' : 'selected' }} >Yes</option>
                                                <option value="no" {{ !empty($c->job_alert_potential_clients) && $c->job_alert_potential_clients == 'no' ? 'selected' : '' }}>No</option>

                                            </select>
                                            @error('job_alert_potential_clients')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label"> Distributed Google Jobs
                                            Network</label>
                                        <!-- YYES/no  -->
                                        <div class="col-sm-10">
                                            <select class="form-control" name="distributed_google_jobs_network">
                                                
                                                <option value="yes" {{ !empty($c->distributed_google_jobs_network) && $c->distributed_google_jobs_network == 'yes' ? 'selected' : '' }}  {{ !empty($c->distributed_google_jobs_network) ? '' : 'selected' }} >Yes</option>
                                                <option value="no" {{ !empty($c->distributed_google_jobs_network) && $c->distributed_google_jobs_network == 'no' ? 'selected' : '' }}>No</option>
                                            </select>
                                            @error('distributed_google_jobs_network')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label"> Featured Job Posts</label>
                                        <!-- YYES/no  -->
                                        <div class="col-sm-10">
                                            <select class="form-control" name="featured_job_posts">
                                                
                                                <option value="yes" {{ !empty($c->featured_job_posts) && $c->featured_job_posts == 'yes' ? 'selected' : '' }}  {{ !empty($c->featured_job_posts) ? '' : 'selected' }} >Yes</option>
                                                <option value="no" {{ !empty($c->featured_job_posts) && $c->featured_job_posts == 'no' ? 'selected' : '' }}>No</option>

                                            </select>
                                            @error('featured_job_posts')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label"> Social Media
                                            Sharing</label>
                                        <!-- YYES/no  -->
                                        <div class="col-sm-10">
                                            <select class="form-control" name="social_media_sharing">
                                                
                                                <option value="yes" {{ !empty($c->social_media_sharing) && $c->social_media_sharing == 'yes' ? 'selected' : '' }}  {{ !empty($c->social_media_sharing) ? '' : 'selected' }} >Yes</option>
                                                <option value="no" {{ !empty($c->social_media_sharing) && $c->social_media_sharing == 'no' ? 'selected' : '' }}>No</option>

                                            </select>
                                            @error('social_media_sharing')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Company logo on home
                                            Page</label>
                                        <!-- YYES/no  -->
                                        <div class="col-sm-10">
                                            <select class="form-control" name="company_logo_on_home_page">
                                                
                                                <option value="yes" {{ !empty($c->company_logo_on_home_page) && $c->company_logo_on_home_page == 'yes' ? 'selected' : '' }}  {{ !empty($c->company_logo_on_home_page) ? '' : 'selected' }} >Yes</option>
                                                <option value="no" {{ !empty($c->company_logo_on_home_page) && $c->company_logo_on_home_page == 'no' ? 'selected' : '' }}>No</option>
                                            </select>
                                            @error('company_logo_on_home_page')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Resume Database
                                            Access</label>
                                        <!-- YYES/no  -->
                                        <div class="col-sm-10">
                                            <select class="form-control" name="resume_database_access">
                                                
                                                <option value="yes" {{ !empty($c->resume_database_access) && $c->resume_database_access == 'yes' ? 'selected' : '' }}  {{ !empty($c->resume_database_access) ? '' : 'selected' }} >Yes</option>
                                                <option value="no" {{ !empty($c->resume_database_access) && $c->resume_database_access == 'no' ? 'selected' : '' }}>No</option>
                                            </select>
                                            @error('resume_database_access')
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
            // ===================================================================
            $('select[name="no_of_jobs_standred_yes_no"]').on('change', function() {
                var selectedValue = $(this).val();

                if (selectedValue === 'yes') {
                    $('#number_of_jobs_standard_input').show();

                } else if (selectedValue === 'no') {
                    $('#number_of_jobs_standard_input').hide();
                } else {
                    // Do something if no option is selected
                    $('#number_of_jobs_standard_input').hide();
                }
            });
            $('select[name="job_post_or_live"]').on('change', function() {
                var selectedValue = $(this).val();

                if (selectedValue === 'yes') {
                    // Action for 'Yes' option
                    console.log('Job is posted or live.');
                    $('#job_post_or_live_no_of_days').show();

                } else if (selectedValue === 'no') {
                    // Action for 'No' option
                    $('#job_post_or_live_no_of_days').hide();
                } else {
                    // Action for no selection
                    $('#job_post_or_live_no_of_days').hide();
                }
            });
            // ===================================================================

















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
