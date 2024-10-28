@extends('company.layouts.afterlogin')

@section('content')
    <?php
    use App\Models\Plans;
    
    ?>
    <div class="dashboard-content">
        {{-- <div class="dashboard-tlbar d-block mb-4">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <h1 class="mb-1 fs-3 fw-medium">Post Jobs</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item text-muted"><a href="#">Employer</a></li>
                        <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-primary">Post Jobs</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div> --}}

        <div class="dashboard-widg-bar d-block">
            <div class="row">

                <div class="col-xl-12">

                    <div class="card">
                        <div class="card-body pt-3">

                            <!-- ============================== Price Box =================================== -->
                            <section>
                                <div class="custom-pack-sec">
                                    <div class="container">
                                        <h2 class="heading-title">Pricing Plans</h2>
                                        <div class="row gy-4">
                                            <ul class="nav nav-pills" style="justify-content: center">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-bs-toggle="pill"
                                                        href="#menu1">Monthly</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="pill" href="#menu2">Yearly</a>
                                                </li>

                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane container fade active show" id="menu1">
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
                                                                    <div class="pricing">$ {{ $value['price_monthly'] }}
                                                                        <span>{{ $value['duration_in_month'] }}/mo
                                                                            /user</span>
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
                                                                            {{ $value['number_of_jobs_standard'] }} Standard
                                                                            Job
                                                                            Post

                                                                            <?php }else { ?>
                                                                            <i class="fa-solid fa-xmark"></i>
                                                                            0 Standard Job Post

                                                                            <?php } ?>
                                                                        </li>
                                                                        {{-- ================================================================== --}}

                                                                        <li>
                                                                            <?php if($value['job_post_or_live'] == 'yes'){ ?>
                                                                            <i class="fa-solid fa-circle-check"></i>
                                                                            Job posts are Live for
                                                                            {{ $value['job_post_or_live_no_of_days'] }} Days

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
                                                                <a href="{{ route('company.payment.form', ['id' => $value->id, 'type' => 'monthly']) }}"
                                                                    class="button-primary w-button">Get started</a>
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
                                                                        <span>{{ $value['duration_in_years'] }}/yearly
                                                                            /user</span>
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
                                                                            {{ $value['number_of_jobs_standard'] }} Standard
                                                                            Job
                                                                            Post

                                                                            <?php }else { ?>
                                                                            <i class="fa-solid fa-xmark"></i>
                                                                            0 Standard Job Post

                                                                            <?php } ?>
                                                                        </li>
                                                                        {{-- ================================================================== --}}

                                                                        <li>
                                                                            <?php if($value['job_post_or_live'] == 'yes'){ ?>
                                                                            <i class="fa-solid fa-circle-check"></i>
                                                                            Job posts are Live for
                                                                            {{ $value['job_post_or_live_no_of_days'] }}
                                                                            Days

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
                                                                <a href="{{ route('company.payment.form', ['id' => $value->id, 'type' => 'yearly']) }}"
                                                                    class="button-primary w-button">Get started</a>
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





                        </div>
                    </div>
                    </section>
                    <!-- ============================== Price Box =================================== -->


                </div>
            </div>

        </div>
    </div>
    </div>
    </section>
@endsection
