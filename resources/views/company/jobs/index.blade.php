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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>



    <div class="dashboard-content">
        <div class="dashboard-tlbar d-block mb-4">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <h1 class="mb-1 fs-3 fw-medium">Plaats vacatures</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-muted"><a href="#">Werkgever</a></li>
                            <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#" class="text-primary">Plaats vacatures</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="dashboard-widg-bar d-block">

            <?php if(!empty($job->id))
{ ?>
            <form action="{{ route('company.jobs.update', $job->id) }}" method="POST" enctype="multipart/form-data">

                <?php }else{?>
                <form action="{{ route('company.jobs.store') }}" method="POST" enctype="multipart/form-data">

                    <?php } ?>

                    @csrf
                    <div class="card">


                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-header">
                            <h4>Basisdetail</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="dash-prf-start justify-content-start align-items-start mb-2">
                                        <div class="col-xl-12 col-lg-12 col-md-12">
                                            <div class="form-group">
                                                {{-- <button class="btn">Company Logo</button> --}}
                                                <input type="file" name="company_logo" class="form-control">
                                                @error('company_logo')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <?php if(!empty($job->company_logo))
                                            { ?>
                                                <img src="{{ asset($job->company_logo) }}" style="width:100px">

                                                <?php } ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Functietitel</label>
                                        <input type="text" class="form-control" name="job_title"
                                            value="{{ old('job_title', !empty($job->job_title) ? $job->job_title : '') }}">

                                        @error('job_title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Functieomschrijving</label>
                                        <textarea class="form-control summernote" name="job_description">
                                        {{ old('job_description', !empty($job->job_description) ? $job->job_description : '') }}
                                       </textarea>



                                        @error('job_description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror


                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>Functiecategorie</label>
                                        <div class="select-ops">
                                            <select name="job_category_id" class="form-control">


                                                <?php foreach ($cat as $key => $value) { ?>
                                                <option value="{{ $value['id'] }}" <?php if (!empty($job->job_category_id)) {
                                                    if ($value['id'] == $job->job_category_id) {
                                                        echo 'selected';
                                                    }
                                                }
                                                
                                                ?>>
                                                    {{ $value['cat_name'] }}</option>
                                                <?php } ?>

                                            </select>

                                            @error('job_category_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>Soort baan</label>
                                        <div class="select-ops">
                                            <select name="job_type_id" class="form-control">
                                                <?php foreach ($type as $key => $value) { ?>
                                                <option value="{{ $value['id'] }}" <?php if (!empty($job->job_type_id)) {
                                                    if ($value['id'] == $job->job_type_id) {
                                                        echo 'selected';
                                                    }
                                                }
                                                
                                                ?>>
                                                    {{ $value['name'] }}</option>
                                                <?php } ?>
                                            </select>

                                            @error('job_type_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>Werkniveau</label>
                                        <div class="select-ops">
                                            <select name="job_level_id" class="form-control">
                                                <?php foreach ($joblevel as $key => $value) { ?>
                                                <option value="{{ $value['id'] }}" <?php if (!empty($job->job_level_id)) {
                                                    if ($value['id'] == $job->job_level_id) {
                                                        echo 'selected';
                                                    }
                                                }
                                                
                                                ?>>
                                                    {{ $value['name'] }}</option>
                                                <?php } ?>
                                            </select>
                                            @error('job_level_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>Ervaring</label>
                                        <div class="select-ops">
                                            <select name="experience_id" class="form-control">
                                                <?php foreach ( $exp as $key => $value) {





                                                ?>
                                                <option value="{{ $value['id'] }}" <?php if (!empty($job->experience_id)) {
                                                    if ($value['id'] == $job->experience_id) {
                                                        echo 'selected';
                                                    }
                                                }
                                                
                                                ?>>
                                                    {{ $value['name'] }}</option>
                                                <?php } ?>


                                            </select>
                                            @error('experience_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>Kwalificatie</label>
                                        <div class="select-ops">
                                            <select name="qualification_id" class="form-control">
                                                <?php foreach ( $qual as $key => $value) { ?>
                                                <option value="{{ $value['id'] }}" <?php if (!empty($job->qualification_id)) {
                                                    if ($value['id'] == $job->qualification_id) {
                                                        echo 'selected';
                                                    }
                                                }
                                                
                                                ?>>
                                                    {{ $value['name'] }}</option>
                                                <?php } ?>
                                            </select>
                                            @error('qualification_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <div class="select-ops">
                                            <select name="gender" class="form-control">
                                                <option value="Male" <?php if (!empty($job->gender)) {
                                                    if ($job->gender == 'Male') {
                                                        echo 'selected';
                                                    }
                                                } ?>>Mannelijk</option>
                                                <option value="Female" <?php if (!empty($job->gender)) {
                                                    if ($job->gender == 'Female') {
                                                        echo 'selected';
                                                    }
                                                } ?>>Vrouwelijk</option>
                                                <option value="Other" <?php if (!empty($job->gender)) {
                                                    if ($job->gender == 'Other') {
                                                        echo 'selected';
                                                    }
                                                } ?>>Ander</option>
                                            </select>
                                            @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>Min. Salaris</label>
                                        <input type="text" class="form-control" name="min_salary"
                                            value="{{ old('min_salary', !empty($job->min_salary) ? $job->min_salary : '') }}">

                                        @error('min_salary')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>Max. Salaris</label>
                                        <input type="text" class="form-control" name="max_salary"
                                            value="{{ old('max_salary', !empty($job->max_salary) ? $job->max_salary : '') }}">
                                        @error('max_salary')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>Vervaldatum van de baan</label>
                                        <input type="date" class="form-control" name="job_expiry_date"
                                            value="{{ old('job_expiry_date', !empty($job->job_expiry_date) ? $job->job_expiry_date : '') }}">
                                        @error('job_expiry_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>Type taakvergoeding</label>
                                        <div class="select-ops">
                                            <select name="job_fee_type_id" class="form-control">
                                                <option value="Normal" <?php if (!empty($job->job_fee_type_id)) {
                                                    if ($job->job_fee_type_id == 'Normal') {
                                                        echo 'selected';
                                                    }
                                                } ?>>Normaal</option>
                                                <option value="Premium" <?php if (!empty($job->job_fee_type_id)) {
                                                    if ($job->job_fee_type_id == 'Premium') {
                                                        echo 'selected';
                                                    }
                                                } ?>>Premie</option>
                                                <option value="Urgent" <?php if (!empty($job->job_fee_type_id)) {
                                                    if ($job->job_fee_type_id == 'Urgent') {
                                                        echo 'selected';
                                                    }
                                                } ?>>Dringend</option>
                                            </select>

                                            @error('job_fee_type_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Vaardigheden, gebruik komma's voor gescheiden</label>
                                        {{-- <input type="text" class="form-control" name="skills"
                                        value="{{ !empty($job->skills) ? $job->skills : ' ' }}"> --}}



                                        {{-- id="mySelect" --}}
                                        <select name="skills[]" class="form-control" id="myMultiSelect"
                                            multiple="multiple">
                                            <?php
                                             $skillss = [];
                                            foreach ($skill as $key => $value) { ?>
                                            <option value="{{ $value['id'] }}" <?php if (!empty($job->skills)) {
                                                $skillss = explode(',', $job->skills);
                                            
                                                if (in_array($value['id'], $skillss)) {
                                                    echo 'selected';
                                                }
                                            }
                                            
                                            ?>>{{ $value['name'] }}
                                            </option>
                                            <?php } ?>
                                        </select>


                                        @error('skills')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>Adres</label>
                                        <input type="text" class="form-control" name="address"
                                            value="{{ old('address', !empty($job->address) ? $job->address : '') }}">

                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>state</label>
                                        <div class="select-ops">
                                            <select name="country_id" class="form-control">
                                                <option value="India" <?php if (!empty($job->country_id)) {
                                                    if ($job->country_id == 'India') {
                                                        echo 'selected';
                                                    }
                                                } ?>>Indië</option>
                                                <option value="2" <?php if (!empty($job->country_id)) {
                                                    if ($job->country_id == '2') {
                                                        echo 'selected';
                                                    }
                                                } ?>>Verenigde Staten</option>
                                                <option value="United States" <?php if (!empty($job->country_id)) {
                                                    if ($job->country_id == 'United States') {
                                                        echo 'selected';
                                                    }
                                                } ?>>Verenigd Koninkrijk
                                                </option>

                                            </select>
                                            @error('country_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>Staat stad</label>
                                        <div class="select-ops">
                                            <select name="city_id" class="form-control">
                                                <option value=" " <?php if (!empty($job->city_id)) {
                                                    if ($job->city_id == 'California') {
                                                        echo 'selected';
                                                    }
                                                } ?>>Californië</option>
                                                <option value="Denver" <?php if (!empty($job->city_id)) {
                                                    if ($job->city_id == 'Denver') {
                                                        echo 'selected';
                                                    }
                                                } ?>>Denver</option>

                                            </select>

                                            @error('city_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>Vastzetten naar boven</label>

                                        <input class="form-check-input" name="pin_to_top" type="checkbox" value="true"
                                            <?php if (!empty($job->mark_a_featured)) {
                                                if ($job->mark_a_featured) {
                                                    echo 'checked';
                                                }
                                            } ?>>

                                        @error('pin_to_top')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>Markeer een aanbevolen</label>
                                        <input class="form-check-input" name="mark_a_featured" type="checkbox"
                                            value="true" <?php if (!empty($job->mark_a_featured)) {
                                                if ($job->mark_a_featured == 1) {
                                                    echo 'checked';
                                                }
                                            } ?>>


                                        @error('mark_a_featured')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>Applied by </label>
                                        <div class="select-ops">
                                            <select name="candidate_applied_by" class="form-control" id="applied_byy">
                                                <option value="applied_by_email">Applied by Email</option>
                                                <option value="applied_by_form" selected>Applied by form </option>
                                                <option value="applied_by_link">Applied by link</option>

                                            </select>

                                            @error('applied_by')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                        </div>



                                    </div>
                                </div>
                                {{-- ==========================================email-div================================================ --}}
                                <div class="col-xl-12 col-lg-6 col-md-12" id="email-divv">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="job_apply_email">

                                    

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>
                                </div>
                                {{-- ==========================================link-div================================================ --}}
                                <div class="col-xl-12 col-lg-6 col-md-12" id="link-divv">
                                    <div class="form-group">
                                        <label>Link</label>
                                        <input type="link" class="form-control" name="job_apply_link">

                                    

                                        @error('link')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                    </div>

                                </div>








<br>
<br>
<br>
<br>
<br>




                            </div>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-lg-12 col-md-12">
                            <button type="submit" class="btn ft--medium btn-primary">Opslaan en bekijken</button>
                        </div>
                    </div>
                </form>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="py-3 text-center">© 2015 - 2023 Job Stock® Themezhub.</div>
            </div>
        </div>
    </div>

    <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


    <script>
        $(document).ready(function() {
            $('#myMultiSelect').select2({
                placeholder: 'Select options',
                allowClear: true
            });

            // Hide both divs initially
            $('#email-divv').hide();
            $('#link-divv').hide();
            $('#applied_byy').change(function() {
                var selectedValue = $(this).val();

                // Hide both divs initially
                $('#email-divv').hide();
                $('#link-divv').hide();

                if (selectedValue == 'applied_by_email') {
                    // Show email div, hide link div
                    $('#email-divv').show();
                } else if (selectedValue == 'applied_by_link') {
                    // Show link div, hide email div
                    $('#link-divv').show();
                } else {
                    // Hide both divs if the selected value doesn't match
                    $('#email-divv').hide();
                    $('#link-divv').hide();
                }
            });





        });
    </script>
@endsection
