@extends('layouts.app')
@section('content')

<!-- End Navigation -->
    <div class="clearfix"></div>
    <!-- ============================================================== -->
    <!-- Top header  -->
    <!-- ============================================================== -->

    <!-- ============================ Header Information Start================================== -->
    <section class="gray-simple">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="emplr-head-block">

                        <div class="emplr-head-left">
                            <div class="emplr-head-thumb">
                                <figure><img src="{{ asset('/') }}{{ $c->profile_picture }}" class="img-fluid rounded"
                                        alt=""></figure>
                            </div>
                            <div class="emplr-head-caption">
                                <div class="emplr-head-caption-top">
                                    <div class="emplr-yior-1"><span
                                            class="label text-sm-muted text-success bg-light-success">{{ count($jobs) }} Openings</span>
                                    </div>
                                    <div class="emplr-yior-2">
                                        <h4 class="emplr-title">{{ $c->name }}</h4>
                                    </div>
                                    <div class="emplr-yior-3">
                                        <span><i class="fa-solid fa-building-shield me-1"></i>{{ !empty($c->cate)? $c->cate['cat_name'] : '' }}</span>
                                        <span><i
                                                class="fa-solid fa-location-dot me-1"></i>{{ $c->city }},{{ $c->country }}</span>
                                        <span class="text-light opacity-75"><i class="fa-solid fa-star me-1"></i>4.2 (412
                                        Reviews)</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="emplr-head-right">
                            {{-- <button type="button" class="btn btn-primary">Volg nu</button> --}}
                            <button type="button" class="btn btn-outline-primary ms-2" data-bs-toggle="modal"
                                data-bs-target="#review"><i class="fa-solid fa-star me-2"></i>Write a review</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ============================ Header Information End ================================== -->

    <!-- ============================ Full Candidate Details Start ================================== -->
    <section>
        <div class="container">
            <!-- row Start -->
            <div class="row">

                <div class="col-xl-8 col-lg-8 col-md-12">
                    <div class="cdtsr-groups-block">

                        <div class="single-cdtsr-block">
                            <div class="single-cdtsr-header">
                                <h5>About company</h5>
                            </div>
                            <div class="single-cdtsr-body">
                                <p>{{ $c->desc }}</p>
                            </div>
                        </div>

                        {{-- <div class="single-cdtsr-block">
                            <div class="single-cdtsr-header">
                                <h5>Onze onderscheiding</h5>
                            </div>
                            <div class="single-cdtsr-body">
                                <div class="row gx-3 gy-4">

                                    <div class="col-xl-3 col-lg-3 col-md-3">
                                        <div class="escort-award-wrap">
                                            <div class="escort-award-thumb">
                                                <figure><img src="assets/img/award-1.png" class="img-fluid" alt="">
                                                </figure>
                                            </div>
                                            <div class="escort-award-caption">
                                                <h6>FIFA-onderscheiding</h6>
                                                <label>Mei 2014</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-3">
                                        <div class="escort-award-wrap">
                                            <div class="escort-award-thumb">
                                                <figure><img src="assets/img/award-2.png" class="img-fluid" alt="">
                                                </figure>
                                            </div>
                                            <div class="escort-award-caption">
                                                <h6>COMPRA-prijs</h6>
                                                <label>december 2017</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-3">
                                        <div class="escort-award-wrap">
                                            <div class="escort-award-thumb">
                                                <figure><img src="assets/img/award-4.png" class="img-fluid" alt="">
                                                </figure>
                                            </div>
                                            <div class="escort-award-caption">
                                                <h6>ICCPR-prijs</h6>
                                                <label>april 2022</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-3 col-lg-3 col-md-3">
                                        <div class="escort-award-wrap">
                                            <div class="escort-award-thumb">
                                                <figure><img src="assets/img/award-3.png" class="img-fluid" alt="">
                                                </figure>
                                            </div>
                                            <div class="escort-award-caption">
                                                <h6>XICAGO-onderscheiding</h6>
                                                <label>Juli 2022</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> --}}

                        <div class="single-cdtsr-block">
                            <div class="single-cdtsr-header">
                                <h5>Business Services</h5>
                            </div>
                            <div class="single-cdtsr-body">
                                <div class="cndts-all-skills-list">
<?php 
$services= [];
    if(!empty($c->company_service))
    {
      $services =  explode(',',$c->company_service);
    }
    
    ?>
                                 @foreach ($services as $item)
                                 <span>{{ $item }}</span>

                                 @endforeach
                                </div>
                            </div>
                        </div>

                        {{-- <div class="single-cdtsr-block">
                            <div class="single-cdtsr-header">
                                <h5>Portefeuille</h5>
                            </div>
                            <div class="single-cdtsr-body">
                                <div class="row gx-3 gy-3">

                                    <div class="col-xl-4 col-lg-4 col-md-6 col-6">
                                        <div class="cndts-prt-block">
                                            <div class="cndts-prt-thumb">
                                                <img src="assets/img/blog-1.jpg" class="img-fluid rounded" alt="">
                                            </div>
                                            <div class="cndts-prt-link"><a href="JavaScript:Void(0);"
                                                    contenteditable="false" style="cursor: pointer;"><i
                                                        class="fa-solid fa-arrow-up-right-from-square"></i></a></div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-6 col-6">
                                        <div class="cndts-prt-block">
                                            <div class="cndts-prt-thumb">
                                                <img src="assets/img/blog-2.jpg" class="img-fluid rounded" alt="">
                                            </div>
                                            <div class="cndts-prt-link"><a href="JavaScript:Void(0);"
                                                    contenteditable="false" style="cursor: pointer;"><i
                                                        class="fa-solid fa-arrow-up-right-from-square"></i></a></div>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-6 col-6">
                                        <div class="cndts-prt-block">
                                            <div class="cndts-prt-thumb">
                                                <img src="assets/img/blog-3.jpg" class="img-fluid rounded"
                                                    alt="">
                                            </div>
                                            <div class="cndts-prt-link"><a href="JavaScript:Void(0);"
                                                    contenteditable="false" style="cursor: pointer;"><i
                                                        class="fa-solid fa-arrow-up-right-from-square"></i></a></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div> --}}

                        @includeIf('partials.jobs.jobswidgetsCompany',['user_id'=>$c->id])


                        <!-- Company Review -->
                        {{-- <div class="single-cdtsr-block">
                            <div class="single-cdtsr-header">
                                <h5>412 Reviews</h5>
                            </div>
                            <div class="single-cdtsr-body">

                                <!-- single Review -->
                                <div class="singleReviews border-bottom py-4">
                                    <div class="singlerev d-flex align-items-start justify-content-start gap-3">
                                        <div class="singlratebox bg-light rounded-3">
                                            <div class="px-3 py-4 text-center">
                                                <h3 class="m-0">4.7</h3>
                                                <div
                                                    class="d-flex align-items-center justify-content-center gap-1 text-xs">
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-solid fa-star-half text-warning"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="reviewsCaption">
                                            <div class="reviewsHeader mb-3">
                                                <h4>Very professional and Smart Company</h4>
                                                <div
                                                    class="d-flex align-items-center justify-content-start flex-wrap gap-2">
                                                    <div class="text-muted text-md"><a href="#"
                                                            class="text-primary" contenteditable="false"
                                                            style="cursor: pointer;">Freelance VizRT</a>(Current Employee).
                                                    </div>
                                                    <div class="text-muted text-md"><a href="#"
                                                            class="text-primary" contenteditable="false"
                                                            style="cursor: pointer;">Washington, DC</a>.</div>
                                                    <div class="text-muted text-md">November 15 2023</div>
                                                </div>
                                            </div>

                                            <div class="reviewsDescription">
                                                <p>
                                                    <span class="d-block">What is the best part of working at the
                                                        company?</span>
                                                    <span>Communication between the operation employees is top notch.
                                                        Everyone is on the same page. Always plan ahead for the both live
                                                        and pre recorded events.</span>
                                                </p>
                                                <p>
                                                    <span class="d-block">What is the most stressful part about working at
                                                        the company?</span>
                                                    <span>Relationship between employees is somewhat neutral unless there
                                                        are sides and that’s when it gets awkward</span>
                                                </p>
                                                <p>
                                                    <span class="d-block">What is the work environment and culture like at
                                                        the company?</span>
                                                    <span>Mostly professional, everyone keeps to themselves.</span>
                                                </p>
                                                <p>
                                                    <span class="d-block">What is a typical day like for you at the
                                                        company?</span>
                                                    <span>My shift always start a couple of hours before going live and
                                                        during this time I have to go through the rundown make sure
                                                        everything is in place.</span>
                                                </p>
                                            </div>

                                            <div class="d-block mt-4">
                                                <div class="text-muted text-md mb-1">Was this review helpful?</div>
                                                <div
                                                    class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                                    <div class="d-first">
                                                        <div class="btn-group" role="group"
                                                            aria-label="Basic outlined example">
                                                            <button type="button"
                                                                class="btn btn-md btn-outline-primary">Yes</button>
                                                            <button type="button"
                                                                class="btn btn-md btn-outline-primary">No</button>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-last d-flex align-items-center justify-content-end gap-3">
                                                        <a href="#" class="text-dark fw-medium"
                                                            contenteditable="false" style="cursor: pointer;"><i
                                                                class="fa-regular fa-flag me-2"></i>Report</a>
                                                        <a href="#" class="text-dark fw-medium"
                                                            contenteditable="false" style="cursor: pointer;"><i
                                                                class="fa-solid fa-up-right-from-square me-2"></i>Share</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <!-- single Review -->
                                <div class="singleReviews border-bottom py-4">
                                    <div class="singlerev d-flex align-items-start justify-content-start gap-3">
                                        <div class="singlratebox bg-light rounded-3">
                                            <div class="px-3 py-4 text-center">
                                                <h3 class="m-0">4.4</h3>
                                                <div
                                                    class="d-flex align-items-center justify-content-center gap-1 text-xs">
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-solid fa-star-half text-warning"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="reviewsCaption">
                                            <div class="reviewsHeader mb-3">
                                                <h4>Superb Company &amp; Services</h4>
                                                <div
                                                    class="d-flex align-items-center justify-content-start flex-wrap gap-2">
                                                    <div class="text-muted text-md"><a href="#"
                                                            class="text-primary" contenteditable="false"
                                                            style="cursor: pointer;">Freelance VizRT</a>(Current Employee).
                                                    </div>
                                                    <div class="text-muted text-md"><a href="#"
                                                            class="text-primary" contenteditable="false"
                                                            style="cursor: pointer;">Washington, DC</a>.</div>
                                                    <div class="text-muted text-md">July 10 2023</div>
                                                </div>
                                            </div>

                                            <div class="reviewsDescription">
                                                <p>
                                                    <span class="d-block">What is the best part of working at the
                                                        company?</span>
                                                    <span>Communication between the operation employees is top notch.
                                                        Everyone is on the same page. Always plan ahead for the both live
                                                        and pre recorded events.</span>
                                                </p>
                                                <p>
                                                    <span class="d-block">What is the most stressful part about working at
                                                        the company?</span>
                                                    <span>Relationship between employees is somewhat neutral unless there
                                                        are sides and that’s when it gets awkward</span>
                                                </p>
                                                <p>
                                                    <span class="d-block">What is the work environment and culture like at
                                                        the company?</span>
                                                    <span>Mostly professional, everyone keeps to themselves.</span>
                                                </p>
                                                <p>
                                                    <span class="d-block">What is a typical day like for you at the
                                                        company?</span>
                                                    <span>My shift always start a couple of hours before going live and
                                                        during this time I have to go through the rundown make sure
                                                        everything is in place.</span>
                                                </p>
                                            </div>

                                            <div class="d-block mt-4">
                                                <div class="text-muted text-md mb-1">Was this review helpful?</div>
                                                <div
                                                    class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                                    <div class="d-first">
                                                        <div class="btn-group" role="group"
                                                            aria-label="Basic outlined example">
                                                            <button type="button"
                                                                class="btn btn-md btn-outline-primary">Yes</button>
                                                            <button type="button"
                                                                class="btn btn-md btn-outline-primary">No</button>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-last d-flex align-items-center justify-content-end gap-3">
                                                        <a href="#" class="text-dark fw-medium"
                                                            contenteditable="false" style="cursor: pointer;"><i
                                                                class="fa-regular fa-flag me-2"></i>Report</a>
                                                        <a href="#" class="text-dark fw-medium"
                                                            contenteditable="false" style="cursor: pointer;"><i
                                                                class="fa-solid fa-up-right-from-square me-2"></i>Share</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <!-- single Review -->
                                <div class="singleReviews border-bottom py-4">
                                    <div class="singlerev d-flex align-items-start justify-content-start gap-3">
                                        <div class="singlratebox bg-light rounded-3">
                                            <div class="px-3 py-4 text-center">
                                                <h3 class="m-0">2.3</h3>
                                                <div
                                                    class="d-flex align-items-center justify-content-center gap-1 text-xs">
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-regular fa-star text-warning"></i>
                                                    <i class="fa-regular fa-star text-warning"></i>
                                                    <i class="fa-regular fa-star text-warning"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="reviewsCaption">
                                            <div class="reviewsHeader mb-3">
                                                <h4>Very Bad Management</h4>
                                                <div
                                                    class="d-flex align-items-center justify-content-start flex-wrap gap-2">
                                                    <div class="text-muted text-md"><a href="#"
                                                            class="text-primary" contenteditable="false"
                                                            style="cursor: pointer;">Freelance VizRT</a>(Current Employee).
                                                    </div>
                                                    <div class="text-muted text-md"><a href="#"
                                                            class="text-primary" contenteditable="false"
                                                            style="cursor: pointer;">Washington, DC</a>.</div>
                                                    <div class="text-muted text-md">August 20 2023</div>
                                                </div>
                                            </div>

                                            <div class="reviewsDescription">
                                                <p>
                                                    <span class="d-block">What is the best part of working at the
                                                        company?</span>
                                                    <span>Communication between the operation employees is top notch.
                                                        Everyone is on the same page. Always plan ahead for the both live
                                                        and pre recorded events.</span>
                                                </p>
                                                <p>
                                                    <span class="d-block">What is the most stressful part about working at
                                                        the company?</span>
                                                    <span>Relationship between employees is somewhat neutral unless there
                                                        are sides and that’s when it gets awkward</span>
                                                </p>
                                                <p>
                                                    <span class="d-block">What is the work environment and culture like at
                                                        the company?</span>
                                                    <span>Mostly professional, everyone keeps to themselves.</span>
                                                </p>
                                                <p>
                                                    <span class="d-block">What is a typical day like for you at the
                                                        company?</span>
                                                    <span>My shift always start a couple of hours before going live and
                                                        during this time I have to go through the rundown make sure
                                                        everything is in place.</span>
                                                </p>
                                            </div>

                                            <div class="d-block mt-4">
                                                <div class="text-muted text-md mb-1">Was this review helpful?</div>
                                                <div
                                                    class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                                    <div class="d-first">
                                                        <div class="btn-group" role="group"
                                                            aria-label="Basic outlined example">
                                                            <button type="button"
                                                                class="btn btn-md btn-outline-primary">Yes</button>
                                                            <button type="button"
                                                                class="btn btn-md btn-outline-primary">No</button>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-last d-flex align-items-center justify-content-end gap-3">
                                                        <a href="#" class="text-dark fw-medium"
                                                            contenteditable="false" style="cursor: pointer;"><i
                                                                class="fa-regular fa-flag me-2"></i>Report</a>
                                                        <a href="#" class="text-dark fw-medium"
                                                            contenteditable="false" style="cursor: pointer;"><i
                                                                class="fa-solid fa-up-right-from-square me-2"></i>Share</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                                <!-- single Review -->
                                <div class="singleReviews border-bottom py-4">
                                    <div class="singlerev d-flex align-items-start justify-content-start gap-3">
                                        <div class="singlratebox bg-light rounded-3">
                                            <div class="px-3 py-4 text-center">
                                                <h3 class="m-0">4.9</h3>
                                                <div
                                                    class="d-flex align-items-center justify-content-center gap-1 text-xs">
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-solid fa-star text-warning"></i>
                                                    <i class="fa-solid fa-star-half text-warning"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="reviewsCaption">
                                            <div class="reviewsHeader mb-3">
                                                <h4>One of The Best Company in Canada</h4>
                                                <div
                                                    class="d-flex align-items-center justify-content-start flex-wrap gap-2">
                                                    <div class="text-muted text-md"><a href="#"
                                                            class="text-primary" contenteditable="false"
                                                            style="cursor: pointer;">Freelance VizRT</a>(Current Employee).
                                                    </div>
                                                    <div class="text-muted text-md"><a href="#"
                                                            class="text-primary" contenteditable="false"
                                                            style="cursor: pointer;">Washington, DC</a>.</div>
                                                    <div class="text-muted text-md">July 27 2022</div>
                                                </div>
                                            </div>

                                            <div class="reviewsDescription">
                                                <p>
                                                    <span class="d-block">What is the best part of working at the
                                                        company?</span>
                                                    <span>Communication between the operation employees is top notch.
                                                        Everyone is on the same page. Always plan ahead for the both live
                                                        and pre recorded events.</span>
                                                </p>
                                                <p>
                                                    <span class="d-block">What is the most stressful part about working at
                                                        the company?</span>
                                                    <span>Relationship between employees is somewhat neutral unless there
                                                        are sides and that’s when it gets awkward</span>
                                                </p>
                                                <p>
                                                    <span class="d-block">What is the work environment and culture like at
                                                        the company?</span>
                                                    <span>Mostly professional, everyone keeps to themselves.</span>
                                                </p>
                                                <p>
                                                    <span class="d-block">What is a typical day like for you at the
                                                        company?</span>
                                                    <span>My shift always start a couple of hours before going live and
                                                        during this time I have to go through the rundown make sure
                                                        everything is in place.</span>
                                                </p>
                                            </div>

                                            <div class="d-block mt-4">
                                                <div class="text-muted text-md mb-1">Was this review helpful?</div>
                                                <div
                                                    class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                                                    <div class="d-first">
                                                        <div class="btn-group" role="group"
                                                            aria-label="Basic outlined example">
                                                            <button type="button"
                                                                class="btn btn-md btn-outline-primary">Yes</button>
                                                            <button type="button"
                                                                class="btn btn-md btn-outline-primary">No</button>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="d-last d-flex align-items-center justify-content-end gap-3">
                                                        <a href="#" class="text-dark fw-medium"
                                                            contenteditable="false" style="cursor: pointer;"><i
                                                                class="fa-regular fa-flag me-2"></i>Report</a>
                                                        <a href="#" class="text-dark fw-medium"
                                                            contenteditable="false" style="cursor: pointer;"><i
                                                                class="fa-solid fa-up-right-from-square me-2"></i>Share</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="pagfooter mx-auto mb-3">
                                <nav aria-label="Page navigation example"
                                    class="justify-content-center align-items-center">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="JavaScript:Void(0);" aria-label="Previous"
                                                contenteditable="false" style="cursor: pointer;">
                                                <span aria-hidden="true">«</span>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="JavaScript:Void(0);"
                                                contenteditable="false" style="cursor: pointer;">1</a></li>
                                        <li class="page-item"><a class="page-link" href="JavaScript:Void(0);"
                                                contenteditable="false" style="cursor: pointer;">2</a></li>
                                        <li class="page-item active"><a class="page-link" href="JavaScript:Void(0);"
                                                contenteditable="false" style="cursor: pointer;">3</a></li>
                                        <li class="page-item"><a class="page-link" href="JavaScript:Void(0);"
                                                contenteditable="false" style="cursor: pointer;">4</a></li>
                                        <li class="page-item"><a class="page-link" href="JavaScript:Void(0);"
                                                contenteditable="false" style="cursor: pointer;">5</a></li>
                                        <li class="page-item"><a class="page-link" href="JavaScript:Void(0);"
                                                contenteditable="false" style="cursor: pointer;">6</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="JavaScript:Void(0);" aria-label="Next"
                                                contenteditable="false" style="cursor: pointer;">
                                                <span aria-hidden="true">»</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>

                        </div> --}}

                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-12">

                    <div class="eflorio-wrap-block mb-4">
                        <div class="eflorio-wrap-group">
                            <div class="eflorio-wrap-body">
                                <div class="eflorio-list-groups">

                                    <div class="single-eflorio-list">
                                        <div class="eflorio-list-icons"><i
                                                class="fa-solid fa-envelope-circle-check text-primary"></i></div>
                                        <div class="eflorio-list-captions">
                                            <label>Email address</label>
                                            <h6>{{ $c->email }}</h6>
                                        </div>
                                    </div>

                                    <div class="single-eflorio-list">
                                        <div class="eflorio-list-icons"><i
                                                class="fa-solid fa-phone-volume text-primary"></i></div>
                                        <div class="eflorio-list-captions">
                                            <label>Contact No.</label>
                                            <h6>{{ $c->mobile }}</h6>
                                        </div>
                                    </div>

                                    <div class="single-eflorio-list">
                                        <div class="eflorio-list-icons"><i
                                                class="fa-solid fa-layer-group text-primary"></i></div>
                                        <div class="eflorio-list-captions">
                                            <label>Category</label>
                                            <h6>{{ !empty($c->cate)? $c->cate['cat_name'] : '' }}</h6>
                                        </div>
                                    </div>

                                    <div class="single-eflorio-list">
                                        <div class="eflorio-list-icons"><i
                                                class="fa-solid fa-user-group text-primary"></i></div>
                                        <div class="eflorio-list-captions">
                                            <label>Company size</label>
                                            <h6>{{ !empty($c->company_size)? $c->company_size : '' }}</h6>
                                        </div>
                                    </div>

                                    <div class="single-eflorio-list">
                                        <div class="eflorio-list-icons"><i
                                                class="fa-solid fa-map-location-dot text-primary"></i></div>
                                        <div class="eflorio-list-captions">
                                            <label>Place</label>
                                            <h6>{{ $c->city }},{{ $c->country }}</h6>
                                        </div>
                                    </div>

                                    <div class="single-eflorio-list">
                                        <div class="eflorio-list-icons"><i
                                                class="fa-solid fa-building-circle-check text-primary"></i></div>
                                        <div class="eflorio-list-captions">
                                            <label>Established</label>
                                            <h6>{{ $c->established }}</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="eflorio-wrap-footer">
                                {{-- <div class="eflorio-footer-body">
                                    <button type="button" class="btn btn-primary fw-medium full-width">Bekijk Website</button>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <div class="sidefr-usr-block">
                        <div class="cndts-share-block">
                            <div class="cndts-share-title">
                                <h5>Company Profile </h5>
                            </div>
                            <div class="cndts-share-list">
                                <ul>
                                    <li><a href="{{ $c->linkedin_profile_link }}" contenteditable="false" style="cursor: pointer;"><i
                                                class="fa-brands fa-linkedin-in"></i></a></li>
                                    <li><a href="{{ $c->twitter_profile_link }}" contenteditable="false" style="cursor: pointer;"><i
                                                class="fa-brands fa-twitter"></i></a></li>
                                    {{-- <li><a href="JavaScript:Void(0);" contenteditable="false" style="cursor: pointer;"><i
                                                class="fa-brands fa-google-plus-g"></i></a></li> --}}
                                    <li><a href="{{ $c->instagram_profile_link }}" contenteditable="false" style="cursor: pointer;"><i
                                                class="fa-brands fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- /row -->
        </div>
    
    
    
        @includeIf('partials.jobs.jobswidgets')

    
    </section>
    <!-- ============================ Full Candidate Details End ================================== -->

    <!-- ============================ Call To Action ================================== -->
    {{-- <section class="bg-cover primary-bg-dark" style="background:url(assets/img/footer-bg-dark.png)no-repeat;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 col-lg-10 col-md-12 col-sm-12">

                    <div class="call-action-wrap">
                        <div class="sec-heading center">
                            <h2 class="lh-base mb-3 text-light">Find The Perfect Job<br>on Job Stock That is Superb For You
                            </h2>
                            <p class="fs-6 text-light">At vero eos et accusamus et iusto odio dignissimos ducimus qui
                                blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias</p>
                        </div>
                        <div class="call-action-buttons mt-3">
                            <a href="JavaScript:Void(0);" class="btn btn-lg btn-dark fw-medium px-xl-5 px-lg-4 me-2"
                                contenteditable="false" style="cursor: pointer;">Upload resume</a>
                            <a href="JavaScript:Void(0);"
                                class="btn btn-lg btn-whites fw-medium px-xl-5 px-lg-4 text-primary"
                                contenteditable="false" style="cursor: pointer;">Join Our Team</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section> --}}
@endsection
