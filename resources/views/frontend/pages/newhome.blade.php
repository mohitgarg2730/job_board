<?php
use App\Models\Plans;
use App\Models\User;
use App\Models\Categeory;
use App\Models\Job;
use App\Models\Skills;
use App\Models\HomePage;
use App\Models\HomePageCity;
use App\Models\HomePageCompanyLogo;
use App\Models\Blog;

use App\Models\JobLevel;

$job_level = JobLevel::get();

$cat = Categeory::take(8)->get();
$blogs = Blog::take(4)->get();
$catt = Categeory::orderBy('cat_name', 'ASC')->get();
$jobs = Job::with(['cat', 'types', 'levels'])->orderBy('created_at', 'desc');
$hh = HomePage::where('id', 1)->first();

// echo"<pre>";
// print_r($hh);
// die;

?>



@extends('layouts.app')

@section('content')
    <!-- End Navigation -->
    <div class="clearfix"></div>
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->


    <!-- ============================ Hero Banner  Start================================== -->
    <div class="image-bg hero-header"
        style="background:#016551 url({{ asset('/') }}{{ !empty($hh->banner) ? $hh->banner : '' }}) no-repeat;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-md-11 col-sm-12">
                    <div class="inner-banner-text text-center">
                        <div class="inner-banner-eclips mb-2">
                            <h1>
                                <?php echo !empty($hh->heading_one) ? $hh->heading_one : ''; ?>
                            </h1>
                            <p class="fs-5">{{ !empty($hh->heading_two) ? $hh->heading_two : '' }}</p>
                        </div>
                    </div>
                    <form action="{{ url('browse-job') }}" method="GET">

                        <div class="full-search-2 mt-5">
                            <div class="hero-search-content search-shadow">

                                <div class="row classic-search-box m-0 gx-2">

                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                                        <div class="form-group briod">
                                            <div class="input-with-icon">
                                                <input type="text" class="form-control" placeholder="Keyword"
                                                    name="title">
                                                <i class="fa-solid fa-magnifying-glass"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                                        <div class="form-group briod">
                                            <div class="input-with-icon">
                                                <select class="form-control" name="cat" style="display: none;">
                                                    <option value="0">--Please Select--</option>

                                                    @foreach ($catt as $c)
                                                        <option value="{{ $c->id }}">{{ $c->cat_name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="nice-select form-control" tabindex="0"><span
                                                        class="current">Job
                                                        Category</span>
                                                    <ul class="list">
                                                        <li data-value="0" class="option selected">Job Category</li>
                                                        @foreach ($catt as $c)
                                                            <li data-value="{{ $c->id }}" class="option ">
                                                                {{ $c->cat_name }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <i class="fa-solid fa-briefcase"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                                        <div class="form-group">
                                            <div class="input-with-icon">
                                                <select class="form-control" style="display: none;" name="job_level">
                                                    <option value="0">---</option>

                                                    @foreach ($job_level as $c)
                                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="nice-select form-control" tabindex="0"><span
                                                        class="current">Select
                                                        Level</span>
                                                    <ul class="list">
                                                        <li data-value="0" class="option selected">Select Level</li>
                                                        @foreach ($job_level as $c)
                                                            <li data-value="{{ $c->id }}" class="option">
                                                                {{ $c->name }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <i class="fa-solid fa-location-crosshairs"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
                                        <div class="fliox-search-wiop">
                                            {{-- <div class="form-group me-2">
                                            <a href="JavaScript:Void(0);" data-bs-toggle="modal"
                                                data-bs-target="#filter" class="btn btn-filter-search"
                                                contenteditable="false" style="cursor: pointer;"><i
                                                    class="fa-solid fa-filter"></i>Filter</a>
                                        </div> --}}
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary full-width">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================ Hero Banner End ================================== -->

    <!-- ============================ Our Partners Start ================================== -->
    {{-- <section class="primary-bg-dark min">
        <div class="container">

            <div class="row justify-content-center mb-2">
                <div class="col-lg-7 col-md-10 text-center">
                    <div class="sec-heading center mb-4">
                        <h5 class="text-light opacity-75 fw-medium">The fastedt-growing companies use Job Stock</h5>
                    </div>
                </div>
            </div>

            <div
                class="row align-items-center justify-content-center row-cols-xl-5 row-cols-lg-5 row-cols-md-3 row-cols-3 gx-3 gy-3">

                <?php
                $company = HomePageCompanyLogo::get()->toArray();
                
                ?>
                <?php foreach ($company as $key => $value) { ?>

                <div class="col">
                    <figure class="single-brand thumb-figure">
                        <img src="{{ asset('/') }}{{ $value['img'] }}" class="img-fluid" alt="">
                    </figure>
                </div>

                <?php }  ?>


            </div>

        </div>
    </section> --}}
    <div class="clearfix"></div>
    <!-- ============================ Our Partners End ================================== -->


    <!-- ============================ Featured Jobs Start ================================== -->
    <section>
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-10 text-center">
                    <div class="sec-heading center">
                        <h2>
                            {!! !empty($hh->job_section_heading) ? $hh->job_section_heading : '' !!}
                        </h2>
                        <p>
                            {!! !empty($hh->job_section_sub_heading) ? $hh->job_section_sub_heading : '' !!}
                        </p>
                    </div>
                </div>
            </div>

            {{-- <div id="jobCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                @php
                    $jobsPerSlide = 4;
                    $jobsChunks = $jobs->take(11)
                        ->get()->chunk($jobsPerSlide);
                @endphp

                @foreach ($jobsChunks as $chunkIndex => $chunk)
                            <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                                <div class="row gx-3 gy-4">
                                    @foreach ($chunk as $key => $result)
                                                        @php
                                                            $s = Skills::orWhereIn('id', explode(',', $result->skills))->get();
                                                        @endphp
                                                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
                                                            <div class="job-instructor-layout border">
                                                                <div class="left-tags-capt">
                                                                    <span class="featured-text">Featured</span>
                                                                </div>
                                                                <div class="brows-job-type">
                                                                    <span class="full-time">
                                                                        {{ isset($result->types['name']) && !empty($result->types['name']) ?
                                            $result->types['name'] : '' }}
                                                                    </span>
                                                                </div>
                                                                <div class="job-instructor-thumb">
                                                                    <a href="#">
                                                                        <img src="{{ asset('/') }}/{{ $result->company_logo }}" class="img-fluid"
                                                                            alt="">
                                                                    </a>
                                                                </div>
                                                                <div class="job-instructor-content">
                                                                    <div class="jbs-job-employer-wrap">
                                                                        <span><span></span></span>
                                                                    </div>
                                                                    <h4 class="instructor-title">
                                                                        <a href="#">{{ $result->job_title }}</a>
                                                                    </h4>
                                                                    <div class="text-center text-sm-muted">
                                                                        <span><i class="fa-solid fa-location-dot me-2"></i>{{ $result->address }}</span>
                                                                    </div>
                                                                    <div class="jbs-grid-job-edrs-group center mt-2">
                                                                        @foreach ($s as $ss)
                                                                            <span>{{ $ss->name }}</span>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                                <div class="jbs-grid-job-apply-btns px-3 py-3">
                                                                    <div class="jbs-btn-groups">
                                                                        <div class="jbs-sng-blux">
                                                                            <div class="jbs-grid-package-title smalls">
                                                                                <h5>${{ $result->min_salary }} -
                                                                                    {{ $result->max_salary }}<span>\Year</span>
                                                                                </h5>
                                                                            </div>
                                                                        </div>
                                                                        <div class="jbs-sng-blux">
                                                                            <a href="{{ url('job-detail', $result->id) }}"
                                                                                class="btn btn-md btn-light-primary px-4">Apply quickly</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                    @endforeach
                                </div>
                            </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#jobCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#jobCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div> --}}

        </div>
    </section>
    <!-- ============================ Featured Jobs End ================================== -->
    <script>
        var carouselElement = document.querySelector('#jobCarousel');
        var carousel = new bootstrap.Carousel(carouselElement, {
            interval: 3000, // 3 seconds
            ride: 'carousel'
        });
    </script>
    {{-- ================================================================== --}}
    {{-- ================================================================== --}}
    {{-- ================================================================== --}}


    @includeIf('partials.jobs.jobswidgets')



    {{-- ============================================================== --}}
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 text-center">
                <div class="sec-heading center">
                    <h2>
                       Latest jobs form our Partners
                    </h2>
                    
                </div>
            </div>
        </div>
        <?php
        $company = User::where('role', 'company')->get()->toArray();
        
        ?>
        <?php foreach ($company as $key => $value) { ?>
        <div class="row">

            <div class="col-md-12 mt-3 mb-3">

                <div class="job_wraper">


                    <div class="job_inner">
                        <div class="job_img">
                            <img src="{{ asset('/') }}{{ $value['profile_picture'] }}" class="img-fluid"
                                alt="job">

                        </div>
                        <div class="job_content">
                            <p>{{ $value['name'] }}</p>

                        </div>
                    </div>
                    <div class="job_btn_right">
                        <div class="time"><i class="fa-regular fa-clock"></i>2pm</div>
                        <div class="apply_btn">

                            <a href="{{ url('company-detail') }}/{{ base64_encode($value['id']) }}/{{ $value['name'] }}"
                                class="btn btn-md btn-primary px-4">View vacancies</a>


                        </div>
                    </div>

                </div>
            </div>

        </div>

        <?php } ?>
    </div>
    {{-- ============================================================== --}}













    <!-- ============================ Side Caption Start ================================== -->
    <div class="position-relative">
        <div class="container">
            <div class="row justify-content-end align-items-md-center">

                <div class="d-none d-lg-block col-lg-6 position-absolute top-0 start-0 bg-cover h-100 rounded-end"
                    style="background-image: url({{ asset('/') }}{{ !empty($hh->left_img) ? $hh->left_img : '' }});">
                </div>
                <div class="d-lg-none mb-5 mb-md-0">
                    <img class="img-fluid rounded"
                        src="{{ asset('/') }}{{ !empty($hh->left_img) ? $hh->left_img : '' }}" alt="Image Description">
                </div>

                <div class="col-lg-6 align-self-center">
                    <div class="p-lg-5 p-md-0 pt-md-5">
                        <!-- Heading -->
                        <div class="mb-4 mb-sm-4">
                            <span class="font--bold label-light-success px-3 py-2 rounded mb-2">Our showcase</span>
                            <h2 class="lh-base mt-2">
                                {{ !empty($hh->section_2_heading_one) ? $hh->section_2_heading_one : '' }}
                            </h2>
                            <?php echo !empty($hh->conten_section_2) ? $hh->conten_section_2 : ''; ?>

                        </div>
                        <!-- End Heading -->


                        <!-- End Row -->

                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-6">
                                <a class="btn btn-primary fw-medium px-4"
                                    href="{{ route('company.register') }}">Register</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="job_btn_right">
                    <div class="time"><i class="fa-regular fa-clock"></i>2pm</div>
                    <div class="apply_btn"><a href="" class="btn btn-md btn-light-primary px-4">Apply</a></div>
                </div>
                <div class="pin"><i class="fa-solid fa-thumbtack"></i></div>
            </div>
        </div>
    </div>
    </div>



    <!-- ============================ Explore Categories City ================================== -->
    <section>
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10 text-center">
                    <div class="sec-heading center">
                        <h2>
                            <?php echo !empty($hh->cat_section_heading) ? $hh->cat_section_heading : ''; ?>
                        </h2>
                        <p>
                            <?php echo !empty($hh->cat_section_sub_heading) ? $hh->cat_section_sub_heading : ''; ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center gx-4 gy-4">

                <?php foreach ($cat as $cc) {

    $j = Job::where('job_category_id', $cc->id)->count();


    ?>



                <!-- Single Item -->
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="category-box light">
                        <div class="category-desc">
                            <div class="category-icon">
                                <img src="{{ asset('/') }}/{{ $cc->cat_img }}">
                            </div>
                            <div class="category-detail category-desc-text">
                                <h4 class="fs-5 mt-2"><a href="{{ route('browse-job') }}">{{ $cc->cat_name }}</a></h4>
                                <p>{{ $j }} Active Jobs</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>



            </div>

        </div>
    </section>
    <!-- ============================ Explore Categories City ================================== -->


    <!-- ============================ Valuable Step Start ================================== -->
    <section class="primary-bg-dark">
        <div class="container">

            <div class="row justify-content-center">
                <div class="sec-heading center">
                    <h2>
                        <?php echo !empty($hh->steps_section_heading) ? $hh->steps_section_heading : ''; ?>
                    </h2>
                    <p>
                        <?php echo !empty($hh->steps_section_sub_heading) ? $hh->steps_section_sub_heading : ''; ?>
                    </p>
                </div>
            </div>

            <div class="row align-items-center gx-4 gy-4">

                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                    <div class="jobstock-posted-box-y78 colored">
                        <div class="jobstock-posted-body-y78">
                            <?php echo !empty($hh->content1_section_3) ? $hh->content1_section_3 : ''; ?>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                    <div class="jobstock-posted-box-y78 colored">
                        <div class="jobstock-posted-body-y78">
                            <?php echo !empty($hh->content2_section_3) ? $hh->content2_section_3 : ''; ?>

                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                    <div class="jobstock-posted-box-y78 colored">
                        <div class="jobstock-posted-body-y78">
                            <?php echo !empty($hh->content3_section_3) ? $hh->content3_section_3 : ''; ?>



                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- ============================ Valuable Step End ================================== -->


    <!-- ============================ Select Your City ================================== -->
    <section>
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-10 text-center">
                    <div class="sec-heading center">
                        <h2>
                            <?php echo !empty($hh->city_section_heading) ? $hh->city_section_heading : ''; ?>
                        </h2>
                        <p>
                            <?php echo !empty($hh->city_section_sub_heading) ? $hh->city_section_sub_heading : ''; ?>
                        </p>
                    </div>
                </div>
            </div>

            <div class="row g-xl-3 g-lg-3 g-4">


                <?php
                $company = HomePageCity::get()->toArray();
                
                ?>
                <?php foreach ($company as $key => $value) { ?>


                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="jbs-location-infortment">
                        <div class="jbs-location-infortment-thumb p-3">
                            <a href="job-search.html" class="jobstock-location-figure">
                                <img src="{{ asset('/') }}{{ $value['img'] }}" class="img-fluid rounded"
                                    alt="">
                            </a>
                        </div>
                        <div class="jbs-location-infortment-content">
                            <h4>{{ $value['name'] }}</h4>
                            {{-- <span class="resy-98 fw-medium text-primary">307+ banen</span> --}}
                        </div>
                    </div>
                </div>

                <?php }?>




            </div>

        </div>
    </section>
    <!-- ============================ Select Your City ================================== -->


    <!-- ============================ Hire Experts Start ================================== -->
    <section class="gray-simple">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-10 text-center">
                    <div class="sec-heading center">
                        <div class="sec-heading center">
                            <h2>
                                <?php echo !empty($hh->company_section_heading) ? $hh->company_section_heading : ''; ?>
                            </h2>
                            <p>
                                <?php echo !empty($hh->company_section_sub_heading) ? $hh->company_section_sub_heading : ''; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center gx-4 gy-4">


                <?php
                $company = User::where('role', 'company')->get()->toArray();
                
                ?>
                <?php foreach ($company as $key => $value) { ?>
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="jbs-grid-usrs-block">
                        <div class="jbs-grid-usrs-thumb">
                            <div class="jbs-grid-yuo">
                                <a href="candidate-detail.html">
                                    <figure><img src="{{ asset('/') }}{{ $value['profile_picture'] }}"
                                            class="img-fluid circle" alt="">
                                    </figure>
                                </a>
                            </div>
                        </div>
                        <div class="jbs-grid-usrs-caption">
                            <div class="jbs-kioyer">
                                {{-- <div class="jbs-kioyer-groups">
                                <span class="fa-solid fa-star active"></span>
                                <span class="fa-solid fa-star active"></span>
                                <span class="fa-solid fa-star active"></span>
                                <span class="fa-solid fa-star active"></span>
                                <span class="fa-solid fa-star"></span>
                                <span class="aal-reveis">4.6</span>
                            </div> --}}
                            </div>
                            <div class="jbs-tiosk">
                                <h4 class="jbs-tiosk-title"><a href="#">{{ $value['name'] }}</a>
                                </h4>
                                {{-- <div class="jbs-tiosk-subtitle"><span>Sr. Web Designer</span></div> --}}
                            </div>
                        </div>
                        <div class="jbs-grid-usrs-info">
                            <div class="jbs-info-ico-style bold">
                                {{-- <div class="jbs-single-y1 style-2"><span><i
                                        class="fa-solid fa-sack-dollar"></i></span>70/H
                            </div>
                            <div class="jbs-single-y1 style-3"><span><i class="fa-solid fa-coins"></i></span>5
                                Years exp.</div> --}}
                            </div>
                        </div>
                        <div class="jbs-grid-usrs-contact">
                            <div class="" style="text-align:center">
                                {{-- <a href="#" class="btn btn-md btn-gray px-4">Profile</a> --}}
                                <a href="{{ url('company-detail') }}/{{ base64_encode($value['id']) }}/{{ $value['name'] }}"
                                    class="btn btn-md btn-primary px-4">View vacancies</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!-- Single Item -->

            </div>

        </div>
    </section>
    <!-- ============================ Hire Experts End ================================== -->

    <!-- ============================ Blogs  ================================== -->
    <section class="gray-simple py-5">
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-xl-6 col-lg-7 col-md-10 text-center">
                    <div class="sec-heading center">
                        <h2>Blogs</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center gx-4 gy-4">
                @foreach ($blogs as $key => $value)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card h-100 custom_card">
                            <div class="card-img-top">
                                <a href="candidate-detail.html">
                                    <img src="{{ asset('/') }}{{ $value['image'] }}" class="img-fluid "
                                        alt="">
                                </a>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title">
                                    <?php echo $value['title']; ?>
                                </h5>
                                <p class="card-text">
                                    <?php echo \Illuminate\Support\Str::limit($value['body'], 150, '...'); ?>
                                </p>
                            </div>
                            <div class="card-footer text-center">
                                <a href="{{ url('blog/') }}/{{ $value['slug'] }}" class="btn btn-primary">View More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- 'See All Blogs' button should be outside of the blog grid -->
            <div class="row justify-content-center mt-4">
                <div class="col-12 text-center">
                    <a href="{{ url('all/blogs') }}" class="btn btn-primary">See All Blogs</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================Blogs End ================================== -->


    <!-- ============================== Price Box =================================== -->
    {{-- <section>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-7 col-md-10 text-center">
                <div class="sec-heading center">
                    <h2>
                        <?php echo !empty($hh->plans_section_heading) ? $hh->plans_section_heading : ''; ?>
                    </h2>
                    <p>
                        <?php echo !empty($hh->plans_section_sub_heading) ? $hh->plans_section_sub_heading : ''; ?>
                    </p>
                </div>
            </div>
        </div>




    </div>
</section> --}}

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
                                        <a href="{{ url('byplan/' . $value['id']) . '/monthly' }}"
                                            class="button-primary w-button">Get
                                            started</a>
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
                                        <a href="{{ url('byplan/' . $value['id'] . '/yearly') }}"
                                            class="button-primary w-button">Get
                                            started</a>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>


                    {{-- <div class="col-md-6 col-lg-4">
                    <div class="pak-sec-inner sec-bg-cover">
                        <div class="flex-horizontal start-top">
                            <img src="./img/pic2.png" class="icon-pricing---brix">
                            <div>
                                <p>For individuals</p>
                                <h3>Basic</h3>
                            </div>
                        </div>
                        <div class="mg-top-18px mg-bottom-32px">
                            <p>Lorem ipsum dolor sit amet doloroli sitiol conse ctetur adipiscing elit.</p>
                            <div class="pricing">$ 99
                                <span>/mo /user</span>
                            </div>
                            <h5>What’s included</h5>
                            <ul>
                                <li><i class="fa-solid fa-circle-check"></i> All analytics features</li>
                                <li><i class="fa-solid fa-circle-check"></i>Up to 250,000 tracked visits</li>
                                <li><i class="fa-solid fa-circle-check"></i> Normal support</li>
                            </ul>
                        </div>
                        <a href="#" class="button-primary w-button">Get started</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="pak-sec-inner">
                        <div class="flex-horizontal start-top">
                            <img src="./img/pic3.png" class="icon-pricing---brix">
                            <div>
                                <p>For individuals</p>
                                <h3>Basic</h3>
                            </div>
                        </div>
                        <div class="mg-top-18px mg-bottom-32px">
                            <p>Lorem ipsum dolor sit amet doloroli sitiol conse ctetur adipiscing elit.</p>
                            <div class="pricing">$ 99
                                <span>/mo /user</span>
                            </div>
                            <h5>What’s included</h5>
                            <ul>
                                <li><i class="fa-solid fa-circle-check"></i> All analytics features</li>
                                <li><i class="fa-solid fa-circle-check"></i>Up to 250,000 tracked visits</li>
                                <li><i class="fa-solid fa-circle-check"></i> Normal support</li>
                            </ul>
                        </div>
                        <a href="#" class="button-primary w-button">Get started</a>
                    </div>
                </div> --}}
                </div>
            </div>
        </div>
    </section>
    <style>
        .custom-pack-sec {
            padding: 10px 0 50px;
        }

        .custom-pack-sec h2.heading-title {
            margin: 0 0 30px;
            text-align: center;
        }

        .pak-sec-inner {
            display: flex;
            padding: 40px 40px 48px;
            flex-direction: column;
            border-style: solid;
            border-width: 1px;
            border-color: #eff0f6;
            border-radius: 24px;
            background-color: #fff;
            box-shadow: 1px 1px 12px 0 rgba(20, 20, 43, 0.08);
        }

        .flex-horizontal.start-top {
            display: flex;
            align-items: center;
            gap: 20px;
            margin: 0 0 20px;
        }

        .mg-top-18px.mg-bottom-32px p {
            color: #777;
            font-size: 18px;
        }

        .pricing {
            color: #000;
            font-size: 40px;
            font-weight: 600;
            margin: 10px 0;
        }

        .pricing span {
            font-size: 20px;
            font-weight: 400;
        }

        .mg-top-18px.mg-bottom-32px h5 {
            font-size: 22px;
            margin: 0 0 10px;
        }

        .mg-top-18px.mg-bottom-32px ul {
            padding-left: 0;
        }

        .mg-top-18px.mg-bottom-32px ul li {
            display: flex;
            font-size: 16px;
            align-items: center;
            gap: 10px;
            margin: 0 0 10px;
        }

        .mg-top-18px.mg-bottom-32px ul li i {
            color: #82d84b;
            font-size: 20px;
        }

        a.button-primary.w-button {
            background: #82d84b;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            border-radius: 50px;
            color: #fff;
            font-size: 20px;
            margin-top: 20px;
        }

        .pak-sec-inner.sec-bg-cover {
            background: #82d84b;
        }

        .pak-sec-inner.sec-bg-cover p {
            color: #000;
        }

        .pak-sec-inner.sec-bg-cover ul li i {
            color: #fff;
        }

        .pak-sec-inner.sec-bg-cover a.button-primary.w-button {
            background: #fff;
            color: #82d84b;
        }
    </style>
    <div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="filtermodal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered filter-popup" role="document">
            <div class="modal-content" id="filtermodal">
                <span class="mod-close" data-bs-dismiss="modal" aria-hidden="true"><i class="fas fa-close"></i></span>
                <div class="modal-header">
                    <h4 class="modal-header-sub-title">Start Your Filter</h4>
                </div>
                <div class="modal-body p-0">
                    <div class="filter-content">
                        <div class="full-tabs-group">
                            <div class="single-tabs-group">
                                <div class="single-tabs-group-header">
                                    <h5>Job Match Score</h5>
                                </div>

                                <div class="single-tabs-group-content">
                                    <div class="d-flex flex-wrap">
                                        <div class="sing-btn-groups">
                                            <input type="checkbox" class="btn-check" id="msix">
                                            <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                for="msix">6.0</label>
                                        </div>
                                        <div class="sing-btn-groups">
                                            <input type="checkbox" class="btn-check" id="msixfive">
                                            <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                for="msixfive">6.5</label>
                                        </div>
                                        <div class="sing-btn-groups">
                                            <input type="checkbox" class="btn-check" id="mseven">
                                            <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                for="mseven">7.0</label>
                                        </div>
                                        <div class="sing-btn-groups">
                                            <input type="checkbox" class="btn-check" id="msevenfive">
                                            <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                for="msevenfive">7.5</label>
                                        </div>
                                        <div class="sing-btn-groups">
                                            <input type="checkbox" class="btn-check" id="meight">
                                            <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                for="meight">8.0</label>
                                        </div>
                                        <div class="sing-btn-groups">
                                            <input type="checkbox" class="btn-check" id="meightfive">
                                            <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                for="meightfive">8.5</label>
                                        </div>
                                        <div class="sing-btn-groups">
                                            <input type="checkbox" class="btn-check" id="mnine">
                                            <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                for="mnine">9.0</label>
                                        </div>
                                        <div class="sing-btn-groups">
                                            <input type="checkbox" class="btn-check" id="mninefive">
                                            <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                for="mninefive">9.5</label>
                                        </div>
                                        <div class="sing-btn-groups">
                                            <input type="checkbox" class="btn-check" id="mten">
                                            <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                for="mten">10</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-tabs-group">
                                <div class="single-tabs-group-header">
                                    <h5>Job Value Score</h5>
                                </div>

                                <div class="single-tabs-group-content">
                                    <div class="d-flex flex-wrap">
                                        <div class="sing-btn-groups">
                                            <input type="checkbox" class="btn-check" id="vsix">
                                            <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                for="vsix">6.0</label>
                                        </div>
                                        <div class="sing-btn-groups">
                                            <input type="checkbox" class="btn-check" id="vsixfive">
                                            <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                for="vsixfive">6.5</label>
                                        </div>
                                        <div class="sing-btn-groups">
                                            <input type="checkbox" class="btn-check" id="vseven">
                                            <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                for="vseven">7.0</label>
                                        </div>
                                        <div class="sing-btn-groups">
                                            <input type="checkbox" class="btn-check" id="vsevenfive">
                                            <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                for="vsevenfive">7.5</label>
                                        </div>
                                        <div class="sing-btn-groups">
                                            <input type="checkbox" class="btn-check" id="veight">
                                            <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                for="veight">8.0</label>
                                        </div>
                                        <div class="sing-btn-groups">
                                            <input type="checkbox" class="btn-check" id="veightfive">
                                            <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                for="veightfive">8.5</label>
                                        </div>
                                        <div class="sing-btn-groups">
                                            <input type="checkbox" class="btn-check" id="vnine">
                                            <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                for="vnine">9.0</label>
                                        </div>
                                        <div class="sing-btn-groups">
                                            <input type="checkbox" class="btn-check" id="vninefive">
                                            <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                for="vninefive">9.5</label>
                                        </div>
                                        <div class="sing-btn-groups">
                                            <input type="checkbox" class="btn-check" id="vten">
                                            <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                for="vten">10</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-tabs-group">
                                <div class="single-tabs-group-header">
                                    <h5>Place Of Work</h5>
                                </div>

                                <div class="single-tabs-group-content">
                                    <div class="d-flex flex-wrap">
                                        <div class="sing-btn-groups">
                                            <input type="checkbox" class="btn-check" id="anywhere" checked>
                                            <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                for="anywhere">Anywhere</label>
                                        </div>
                                        <div class="sing-btn-groups">
                                            <input type="checkbox" class="btn-check" id="onsite">
                                            <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                for="onsite">On Site</label>
                                        </div>
                                        <div class="sing-btn-groups">
                                            <input type="checkbox" class="btn-check" id="remote">
                                            <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                for="remote">Fully Remote</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-tabs-group">
                                <div class="single-tabs-group-header">
                                    <h5>Type Of Contract</h5>
                                </div>

                                <div class="single-tabs-group-content">
                                    <div class="d-flex flex-wrap">
                                        <div class="sing-btn-groups">
                                            <input type="checkbox" class="btn-check" id="employee1">
                                            <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                for="employee1">Employee</label>
                                        </div>
                                        <div class="sing-btn-groups">
                                            <input type="checkbox" class="btn-check" id="frelancers1">
                                            <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                for="frelancers1">Freelancer</label>
                                        </div>
                                        <div class="sing-btn-groups">
                                            <input type="checkbox" class="btn-check" id="contractor1">
                                            <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                for="contractor1">Contractor</label>
                                        </div>
                                        <div class="sing-btn-groups">
                                            <input type="checkbox" class="btn-check" id="internship1">
                                            <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                for="internship1">Internship</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-tabs-group">
                                <div class="single-tabs-group-header">
                                    <h5>Type Of Employment</h5>
                                </div>

                                <div class="single-tabs-group-content">
                                    <div class="d-flex flex-wrap">
                                        <div class="sing-btn-groups">
                                            <input type="checkbox" class="btn-check" id="fulltime">
                                            <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                for="fulltime">Full Time</label>
                                        </div>
                                        <div class="sing-btn-groups">
                                            <input type="checkbox" class="btn-check" id="parttime">
                                            <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                for="parttime">Part Time</label>
                                        </div>
                                        <div class="sing-btn-groups">
                                            <input type="checkbox" class="btn-check" id="freelance2" checked>
                                            <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                for="freelance2">Freelance</label>
                                        </div>
                                        <div class="sing-btn-groups">
                                            <input type="checkbox" class="btn-check" id="internship2">
                                            <label class="btn btn-md btn-outline-primary font--bold rounded-5"
                                                for="internship2">Internship</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="single-tabs-group">
                                <div class="single-tabs-group-header">
                                    <h5>Radius In Miles</h5>
                                </div>

                                <div class="single-tabs-group-content">
                                    <div class="rg-slider">
                                        <input type="text" class="js-range-slider" name="my_range" value="">
                                    </div>
                                </div>
                            </div>

                            <div class="single-tabs-group">
                                <div class="single-tabs-group-header">
                                    <h5>Explore Top Categories</h5>
                                </div>

                                <div class="single-tabs-group-content">
                                    <ul class="row p-0 m-0">
                                        <li class="col-lg-6 col-md-6 p-0">
                                            <div class="form-check form-check-inline">
                                                <input id="s-1" class="form-check-input" name="s-1"
                                                    type="checkbox">
                                                <label for="s-1" class="form-check-label">IT Computers</label>
                                            </div>
                                        </li>
                                        <li class="col-lg-6 col-md-6 p-0">
                                            <div class="form-check form-check-inline">
                                                <input id="s-2" class="form-check-input" name="s-2"
                                                    type="checkbox">
                                                <label for="s-2" class="form-check-label">Web Design</label>
                                            </div>
                                        </li>
                                        <li class="col-lg-6 col-md-6 p-0">
                                            <div class="form-check form-check-inline">
                                                <input id="s-3" class="form-check-input" name="s-3"
                                                    type="checkbox">
                                                <label for="s-3" class="form-check-label">Web development</label>
                                            </div>
                                        </li>
                                        <li class="col-lg-6 col-md-6 p-0">
                                            <div class="form-check form-check-inline">
                                                <input id="s-4" class="form-check-input" name="s-4"
                                                    type="checkbox">
                                                <label for="s-4" class="form-check-label">SEO Services</label>
                                            </div>
                                        </li>
                                        <li class="col-lg-6 col-md-6 p-0">
                                            <div class="form-check form-check-inline">
                                                <input id="s-5" class="form-check-input" name="s-5"
                                                    type="checkbox">
                                                <label for="s-5" class="form-check-label">Financial Service</label>
                                            </div>
                                        </li>
                                        <li class="col-lg-6 col-md-6 p-0">
                                            <div class="form-check form-check-inline">
                                                <input id="s-6" class="form-check-input" name="s-6"
                                                    type="checkbox">
                                                <label for="s-6" class="form-check-label">Art, Design, Media</label>
                                            </div>
                                        </li>
                                        <li class="col-lg-6 col-md-6 p-0">
                                            <div class="form-check form-check-inline">
                                                <input id="s-7" class="form-check-input" name="s-7"
                                                    type="checkbox">
                                                <label for="s-7" class="form-check-label">Coach & Education</label>
                                            </div>
                                        </li>
                                        <li class="col-lg-6 col-md-6 p-0">
                                            <div class="form-check form-check-inline">
                                                <input id="s-8" class="form-check-input" name="s-8"
                                                    type="checkbox">
                                                <label for="s-8" class="form-check-label">Apps Developements</label>
                                            </div>
                                        </li>
                                        <li class="col-lg-6 col-md-6 p-0">
                                            <div class="form-check form-check-inline">
                                                <input id="s-9" class="form-check-input" name="s-9"
                                                    type="checkbox">
                                                <label for="s-9" class="form-check-label">IOS Development</label>
                                            </div>
                                        </li>
                                        <li class="col-lg-6 col-md-6 p-0">
                                            <div class="form-check form-check-inline">
                                                <input id="s-10" class="form-check-input" name="s-10"
                                                    type="checkbox">
                                                <label for="s-10" class="form-check-label">Android Development</label>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="single-tabs-group">
                                <div class="single-tabs-group-header">
                                    <h5>Keywords</h5>
                                </div>

                                <div class="single-tabs-group-content">
                                    <div class="form-group">
                                        <input type="text" class="form-control"
                                            placeholder="Design, Java, Python, WordPress etc...">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="filt-buttons-updates">
                        <button type="button" class="btn btn-dark">Clear Filter</button>
                        <button type="button" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================== Price Box =================================== -->


    <!-- ============================ Call To Action ================================== -->
    {{-- <section class="bg-cover call-action-container dark"
    style="background:#016551 url(assets/img/footer-bg-dark.png)no-repeat;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-10 col-md-12 col-sm-12">

                <div class="call-action-wrap">
                    <div class="call-action-caption">
                        <h2 class="text-light">Werkt u al bij ons?</h2>
                        <p class="fs-6 text-light">Bij vero eos et accusamus et iusto odio dignissimos ducimus
                            die blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas
                            molestieën</p>
                    </div>
                    <div class="call-action-form">
                        <form>
                            <div class="newsltr-form">
                                <input type="text" class="form-control" placeholder="Voer uw e-mailadres in">
                                <button type="button" class="btn btn-subscribe">Abonneren</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</section> --}}
    <!-- ============================ Call To Action End ================================== -->
@endsection
