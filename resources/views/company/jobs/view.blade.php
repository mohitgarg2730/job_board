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
.invalid-feedback
{
    display: block !important;
}
</style>

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
            <div class="card">
                <div class="card-header">
                    <h4>Basic Detail</h4>
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
                                <label>Job Title</label>
                                <input type="text" class="form-control" name="job_title"
                                    value="{{ !empty($job->job_title) ? $job->job_title : ' ' }}">

                                @error('job_title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>

                        <div class="col-xl-12 col-lg-12 col-md-12">
                            <div class="form-group">
                                <label>Job Description</label>
                                <input type="text" class="form-control" name="job_description"
                                    value="{{ !empty($job->job_description) ? $job->job_description : ' ' }}">

                                @error('job_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror


                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Job Category</label>
                                <div class="select-ops">
                                    <select name="job_category_id" class="form-control">


                                        <?php foreach ($cat as $key => $value) { ?>
                                        <option value="{{ $value['id'] }}" <?php if(!empty($job->job_category_id))
                                            {

                                            if($value['id'] == $job->job_category_id ) {

                                            echo"selected";

                                            }
                                            }

                                            ?>



                                            >{{ $value['cat_name'] }}</option>
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
                                <label>Job Type</label>
                                <div class="select-ops">
                                    <select name="job_type_id" class="form-control">
                                        <?php foreach ($type as $key => $value) { ?>
                                        <option value="{{ $value['id'] }}" <?php if(!empty($job->job_type_id))
                                            {

                                            if($value['id'] == $job->job_type_id ) {

                                            echo"selected";

                                            }
                                            }

                                            ?>




                                            >{{ $value['name'] }}</option>
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
                                <label>Job Level</label>
                                <div class="select-ops">
                                    <select name="job_level_id" class="form-control">
                                        <?php foreach ($joblevel as $key => $value) { ?>
                                        <option value="{{ $value['id'] }}" <?php if(!empty($job->job_level_id))
                                            {

                                            if($value['id'] == $job->job_level_id ) {

                                            echo"selected";

                                            }
                                            }

                                            ?>


                                            >{{ $value['name'] }}</option>
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
                                <label>Experience</label>
                                <div class="select-ops">
                                    <select name="experience_id" class="form-control">
                                        <?php foreach ( $exp as $key => $value) {





                                            ?>
                                        <option value="{{ $value['id'] }}" <?php if(!empty($job->experience_id))
                                            {

                                            if($value['id'] == $job->experience_id ) {

                                            echo"selected";

                                            }
                                            }

                                            ?>


                                            >{{ $value['name'] }}</option>
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
                                <label>Qualification</label>
                                <div class="select-ops">
                                    <select name="qualification_id" class="form-control">
                                        <?php foreach ( $qual as $key => $value) { ?>
                                        <option value="{{ $value['id'] }}" <?php if(!empty($job->qualification_id))
                                            {

                                            if($value['id'] == $job->qualification_id ) {

                                            echo"selected";

                                            }
                                            }

                                            ?>





                                            >{{ $value['name'] }}</option>
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
                                            } ?>>Male</option>
                                        <option value="Female" <?php if (!empty($job->gender)) {
                                            if ($job->gender == 'Female') {
                                            echo 'selected';
                                            }
                                            } ?>>Female</option>
                                        <option value="Other" <?php if (!empty($job->gender)) {
                                            if ($job->gender == 'Other') {
                                            echo 'selected';
                                            }
                                            } ?>>Other</option>
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
                                <label>Min. Salary</label>
                                <input type="text" class="form-control" name="min_salary"
                                    value="{{ !empty($job->min_salary) ? $job->min_salary : ' ' }}">

                                @error('min_salary')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Max. Salary</label>
                                <input type="text" class="form-control" name="max_salary"
                                    value="{{ !empty($job->max_salary) ? $job->max_salary : ' ' }}">
                                @error('max_salary')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Job Expiry Date</label>
                                <input type="date" class="form-control" name="job_expiry_date"
                                    value="{{ !empty($job->job_expiry_date) ? $job->job_expiry_date : ' ' }}">
                                @error('job_expiry_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Job Fee Type</label>
                                <div class="select-ops">
                                    <select name="job_fee_type_id" class="form-control">
                                        <option value="1" <?php if (!empty($job->job_fee_type_id)) {
                                            if ($job->job_fee_type_id == '1') {
                                            echo 'selected';
                                            }
                                            } ?>>Normal</option>
                                        <option value="2" <?php if (!empty($job->job_fee_type_id)) {
                                            if ($job->job_fee_type_id == '2') {
                                            echo 'selected';
                                            }
                                            } ?>>Premium</option>
                                        <option value="3" <?php if (!empty($job->job_fee_type_id)) {
                                            if ($job->job_fee_type_id == '3') {
                                            echo 'selected';
                                            }
                                            } ?>>Urgent</option>
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
                                <label>Skills, Use Commas for separate</label>
                                {{-- <input type="text" class="form-control" name="skills"
                                    value="{{ !empty($job->skills) ? $job->skills : ' ' }}"> --}}



                                {{-- id="mySelect" --}}
                                <select name="skills[]" class="form-control" id="myMultiSelect" multiple="multiple">
                                    <?php
                                         $skillss = [];
                                        foreach ($skill as $key => $value) { ?>
                                    <option value="{{ $value['id'] }}" <?php if(!empty($job->skills))
                                        {
                                        $skillss = explode(",",$job->skills);

                                        if (in_array($value['id'] , $skillss))
                                        {
                                        echo "selected";
                                        }
                                        }

                                        ?>


                                        >{{ $value['name'] }}</option>
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
                                <label>Address</label>
                                <input type="text" class="form-control" name="address"
                                    value="{{ !empty($job->address) ? $job->address : ' ' }}">

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="form-group">
                                <label>Country</label>
                                <div class="select-ops">
                                    <select name="country_id" class="form-control">
                                        <option value="1" <?php if (!empty($job->country_id)) {
                                            if ($job->country_id == '1') {
                                            echo 'selected';
                                            }
                                            } ?>>India</option>
                                        <option value="2" <?php if (!empty($job->country_id)) {
                                            if ($job->country_id == '2') {
                                            echo 'selected';
                                            }
                                            } ?>>United States</option>
                                        <option value="3" <?php if (!empty($job->country_id)) {
                                            if ($job->country_id == '3') {
                                            echo 'selected';
                                            }
                                            } ?>>United Kingdom</option>
                                        <option value="4" <?php if (!empty($job->country_id)) {
                                            if ($job->country_id == '4') {
                                            echo 'selected';
                                            }
                                            } ?>>Australia</option>
                                        <option value="5" <?php if (!empty($job->country_id)) {
                                            if ($job->country_id == '5') {
                                            echo 'selected';
                                            }
                                            } ?>>Russia</option>
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
                                <label>State/City</label>
                                <div class="select-ops">
                                    <select name="city_id" class="form-control">
                                        <option value="1" <?php if (!empty($job->city_id)) {
                                            if ($job->city_id == '1') {
                                            echo 'selected';
                                            }
                                            } ?>>California</option>
                                        <option value="2" <?php if (!empty($job->city_id)) {
                                            if ($job->city_id == '2') {
                                            echo 'selected';
                                            }
                                            } ?>>Denver</option>
                                        <option value="3" <?php if (!empty($job->city_id)) {
                                            if ($job->city_id == '3') {
                                            echo 'selected';
                                            }
                                            } ?>>New York</option>
                                        <option value="4" <?php if (!empty($job->city_id)) {
                                            if ($job->city_id == '4') {
                                            echo 'selected';
                                            }
                                            } ?>>Canada</option>
                                        <option value="5" <?php if (!empty($job->city_id)) {
                                            if ($job->city_id == '5') {
                                            echo 'selected';
                                            }
                                            } ?>>Poland</option>
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
                                <label>Zip Code</label>
                                <input type="text" class="form-control" name="zip_code"
                                    value="{{ !empty($job->zip_code) ? $job->zip_code : ' ' }}">

                                @error('zip_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>
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
