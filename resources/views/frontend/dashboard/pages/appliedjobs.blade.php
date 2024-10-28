@extends('layouts.candidate')

@section('content')

    
    <div class="dashboard-content">
        <div class="dashboard-tlbar d-block mb-4">
            <div class="row">
                <div class="colxl-12 col-lg-12 col-md-12">
                    <h1 class="mb-1 fs-3 fw-medium">Applied jobs</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-muted"><a href="#">Candidate</a></li>
                            <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="#" class="text-primary">Applied jobs</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        
        <div class="dashboard-widg-bar d-block">
            
            <!-- Header Wrap -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                    <div class="card-header">
                        <div class="_mp-inner-content elior">
                            <div class="_mp-inner-first">
                                <div class="search-inline">
                                    <input type="text" class="form-control" placeholder="Job title, keywords etc.">
                                    <button type="button" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                            <div class="_mp_inner-last">
                                <div class="item-shorting-box-right">
                                    <div class="shorting-by me-2 small">
                                        <select style="display: none;">
                                            <option value="0">Sort by (Default)</option>
                                            <option value="1">Sort by (Featured)</option>
                                            <option value="2">Sort by (Urgent)</option>
                                            <option value="3">Sort by (Posting Date)</option>
                                        </select>
                                        <div class="nice-select" tabindex="0">
                                            <span class="current">Sort by (Default)</span>
                                            <ul class="list">
                                                <li data-value="0" class="option selected">Sort by (Default)</li>
                                                <li data-value="1" class="option">Sort by (Featured)</li>
                                                <li data-value="2" class="option">Sort by (Urgent)</li>
                                                <li data-value="3" class="option">Sort by (Posting Date)</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                        <div class="card-body">
                            <!-- Start All List -->
                            <div class="row justify-content-start gx-3 gy-4">
                        
                                <!-- Single Item -->
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="jbs-list-box border">
                                        <div class="jbs-list-head">
                                            <div class="jbs-list-head-thunner">
                                                <div class="jbs-list-emp-thumb jbs-verified"><a href="job-detail.html"><figure><img src="https://placehold.co/200x200" class="img-fluid" alt=""></figure></a></div>
                                                <div class="jbs-list-job-caption">
                                                    <div class="jbs-job-types-wrap"><span class="label text-success bg-light-success">Full Time</span></div>
                                                    <div class="jbs-job-title-wrap"><h4><a href="job-detail.html" class="jbs-job-title">Product designer</a></h4></div>
                                                    <div class="jbs-job-mrch-lists">
                                                        <div class="single-mrch-lists">
                                                            <span>Tripadvisor</span>.<span><i class="fa-solid fa-location-dot me-1"></i>California</span>.<span>07 april 2023</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jbs-list-head-middle">
                                                <div class="elsocrio-jbs"><span class="text-sm-muted">Apply 02 June 2022</span></div>
                                            </div>
                                            <div class="jbs-list-head-middle">
                                                <div class="elsocrio-jbs"><span class="text-sm-muted text-light bg-success py-2 px-3 rounded">Approved</span></div>
                                            </div>
                                            <div class="jbs-list-head-last">
                                                <a href="JavaScript:Void(0);" class="btn btn-md btn-light-danger px-3 me-2"><i class="fa-solid fa-xmark"></i></a>
                                                <a href="job-detail.html" class="btn btn-md btn-light-primary px-3"><i class="fa-solid fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Single Item -->
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="jbs-list-box border">
                                        <div class="jbs-list-head">
                                            <div class="jbs-list-head-thunner">
                                                <div class="jbs-list-emp-thumb"><a href="job-detail.html"><figure><img src="https://placehold.co/200x200" class="img-fluid" alt=""></figure></a></div>
                                                <div class="jbs-list-job-caption">
                                                    <div class="jbs-job-types-wrap"><span class="label text-success bg-light-success">Full Time</span></div>
                                                    <div class="jbs-job-title-wrap"><h4><a href="job-detail.html" class="jbs-job-title">Product designer</a></h4></div>
                                                    <div class="jbs-job-mrch-lists">
                                                        <div class="single-mrch-lists">
                                                            <span>Pinterest</span>.<span><i class="fa-solid fa-location-dot me-1"></i>Allahabad</span>.<span>2 april 2023</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jbs-list-head-middle">
                                                <div class="elsocrio-jbs"><span class="text-sm-muted">Apply 02 March 2022</span></div>
                                            </div>
                                            <div class="jbs-list-head-middle">
                                                <div class="elsocrio-jbs"><span class="text-sm-muted text-light bg-warning py-2 px-3 rounded">In treatment</span></div>
                                            </div>
                                            <div class="jbs-list-head-last">
                                                <a href="JavaScript:Void(0);" class="btn btn-md btn-light-danger px-3 me-2"><i class="fa-solid fa-xmark"></i></a>
                                                <a href="job-detail.html" class="btn btn-md btn-light-primary px-3"><i class="fa-solid fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Single Item -->
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="jbs-list-box border">
                                        <div class="jbs-list-head">
                                            <div class="jbs-list-head-thunner">
                                                <div class="jbs-list-emp-thumb"><a href="job-detail.html"><figure><img src="https://placehold.co/200x200" class="img-fluid" alt=""></figure></a></div>
                                                <div class="jbs-list-job-caption">
                                                    <div class="jbs-job-types-wrap"><span class="label text-success bg-light-success">Full Time</span></div>
                                                    <div class="jbs-job-title-wrap"><h4><a href="job-detail.html" class="jbs-job-title">Product designer</a></h4></div>
                                                    <div class="jbs-job-mrch-lists">
                                                        <div class="single-mrch-lists">
                                                            <span>Shopify</span>.<span><i class="fa-solid fa-location-dot me-1"></i>Canada, VS</span>.<span>15 March 2023</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jbs-list-head-middle">
                                                <div class="elsocrio-jbs"><span class="text-sm-muted">Apply 07 February 2022</span></div>
                                            </div>
                                            <div class="jbs-list-head-middle">
                                                <div class="elsocrio-jbs"><span class="text-sm-muted text-light bg-success py-2 px-3 rounded">Approved</span></div>
                                            </div>
                                            <div class="jbs-list-head-last">
                                                <a href="JavaScript:Void(0);" class="btn btn-md btn-light-danger px-3 me-2"><i class="fa-solid fa-xmark"></i></a>
                                                <a href="job-detail.html" class="btn btn-md btn-light-primary px-3"><i class="fa-solid fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Single Item -->
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="jbs-list-box border">
                                        <div class="jbs-list-head">
                                            <div class="jbs-list-head-thunner">
                                                <div class="jbs-list-emp-thumb jbs-verified"><a href="job-detail.html"><figure><img src="https://placehold.co/200x200" class="img-fluid" alt=""></figure></a></div>
                                                <div class="jbs-list-job-caption">
                                                    <div class="jbs-job-types-wrap"><span class="label text-success bg-light-success">Full Time</span></div>
                                                    <div class="jbs-job-title-wrap"><h4><a href="job-detail.html" class="jbs-job-title">Jr. Laravel Developer</a></h4></div>
                                                    <div class="jbs-job-mrch-lists">
                                                        <div class="single-mrch-lists">
                                                            <span>Dreezoo</span>.<span><i class="fa-solid fa-location-dot me-1"></i>Liverpool, United Kingdom</span>.<span>20 March 2023</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jbs-list-head-middle">
                                                <div class="elsocrio-jbs"><span class="text-sm-muted">Apply 02 June 2022</span></div>
                                            </div>
                                            <div class="jbs-list-head-middle">
                                                <div class="elsocrio-jbs"><span class="text-sm-muted text-light bg-warning py-2 px-3 rounded">In treatment</span></div>
                                            </div>
                                            <div class="jbs-list-head-last">
                                                <a href="JavaScript:Void(0);" class="btn btn-md btn-light-danger px-3 me-2"><i class="fa-solid fa-xmark"></i></a>
                                                <a href="job-detail.html" class="btn btn-md btn-light-primary px-3"><i class="fa-solid fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Single Item -->
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="jbs-list-box border">
                                        <div class="jbs-list-head">
                                            <div class="jbs-list-head-thunner">
                                                <div class="jbs-list-emp-thumb"><a href="job-detail.html"><figure><img src="https://placehold.co/200x200" class="img-fluid" alt=""></figure></a></div>
                                                <div class="jbs-list-job-caption">
                                                    <div class="jbs-job-types-wrap"><span class="label text-success bg-light-success">Enternship</span></div>
                                                    <div class="jbs-job-title-wrap"><h4><a href="job-detail.html" class="jbs-job-title">Java &amp; Python Developer</a></h4></div>
                                                    <div class="jbs-job-mrch-lists">
                                                        <div class="single-mrch-lists">
                                                            <span>Photoshop</span>.<span><i class="fa-solid fa-location-dot me-1"></i>California</span>.<span>20 February 2023</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jbs-list-head-middle">
                                                <div class="elsocrio-jbs"><span class="text-sm-muted">Apply 20 October 2022</span></div>
                                            </div>
                                            <div class="jbs-list-head-middle">
                                                <div class="elsocrio-jbs"><span class="text-sm-muted text-light bg-success py-2 px-3 rounded">Approved</span></div>
                                            </div>
                                            <div class="jbs-list-head-last">
                                                <a href="JavaScript:Void(0);" class="btn btn-md btn-light-danger px-3 me-2"><i class="fa-solid fa-xmark"></i></a>
                                                <a href="job-detail.html" class="btn btn-md btn-light-primary px-3"><i class="fa-solid fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Single Item -->
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="jbs-list-box border">
                                        <div class="jbs-list-head">
                                            <div class="jbs-list-head-thunner">
                                                <div class="jbs-list-emp-thumb"><a href="job-detail.html"><figure><img src="https://placehold.co/200x200" class="img-fluid" alt=""></figure></a></div>
                                                <div class="jbs-list-job-caption">
                                                    <div class="jbs-job-types-wrap"><span class="label text-success bg-light-success">Full Time</span></div>
                                                    <div class="jbs-job-title-wrap"><h4><a href="job-detail.html" class="jbs-job-title">Sr. Code Ignetor Developer</a></h4></div>
                                                    <div class="jbs-job-mrch-lists">
                                                        <div class="single-mrch-lists">
                                                            <span>Firefox</span>.<span><i class="fa-solid fa-location-dot me-1"></i>Canada, VS</span>.<span>18 February 2023</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jbs-list-head-middle">
                                                <div class="elsocrio-jbs"><span class="text-sm-muted">Apply 02 June 2022</span></div>
                                            </div>
                                            <div class="jbs-list-head-middle">
                                                <div class="elsocrio-jbs"><span class="text-sm-muted text-light bg-success py-2 px-3 rounded">Approved</span></div>
                                            </div>
                                            <div class="jbs-list-head-last">
                                                <a href="JavaScript:Void(0);" class="btn btn-md btn-light-danger px-3 me-2"><i class="fa-solid fa-xmark"></i></a>
                                                <a href="job-detail.html" class="btn btn-md btn-light-primary px-3"><i class="fa-solid fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Single Item -->
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="jbs-list-box border">
                                        <div class="jbs-list-head">
                                            <div class="jbs-list-head-thunner">
                                                <div class="jbs-list-emp-thumb"><a href="job-detail.html"><figure><img src="https://placehold.co/200x200" class="img-fluid" alt=""></figure></a></div>
                                                <div class="jbs-list-job-caption">
                                                    <div class="jbs-job-types-wrap"><span class="label text-success bg-light-success">Deeltijd</span></div>
                                                    <div class="jbs-job-title-wrap"><h4><a href="job-detail.html" class="jbs-job-title">Sr. Magento Developer</a></h4></div>
                                                    <div class="jbs-job-mrch-lists">
                                                        <div class="single-mrch-lists">
                                                            <span>Airbnb</span>.<span><i class="fa-solid fa-location-dot me-1"></i>London, United Kingdom</span>.<span>15 February 2023</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jbs-list-head-middle">
                                                <div class="elsocrio-jbs"><span class="text-sm-muted">Apply 02 June 2022</span></div>
                                            </div>
                                            <div class="jbs-list-head-middle">
                                                <div class="elsocrio-jbs"><span class="text-sm-muted text-light bg-warning py-2 px-3 rounded">In treatment</span></div>
                                            </div>
                                            <div class="jbs-list-head-last">
                                                <a href="JavaScript:Void(0);" class="btn btn-md btn-light-danger px-3 me-2"><i class="fa-solid fa-xmark"></i></a>
                                                <a href="job-detail.html" class="btn btn-md btn-light-primary px-3"><i class="fa-solid fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Single Item -->
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="jbs-list-box border">
                                        <div class="jbs-list-head">
                                            <div class="jbs-list-head-thunner">
                                                <div class="jbs-list-emp-thumb jbs-verified"><a href="job-detail.html"><figure><img src="https://placehold.co/200x200" class="img-fluid" alt=""></figure></a></div>
                                                <div class="jbs-list-job-caption">
                                                    <div class="jbs-job-types-wrap"><span class="label text-success bg-light-success">Full Time</span></div>
                                                    <div class="jbs-job-title-wrap"><h4><a href="job-detail.html" class="jbs-job-title">New Shopify Developer</a></h4></div>
                                                    <div class="jbs-job-mrch-lists">
                                                        <div class="single-mrch-lists">
                                                            <span>Snapchat</span>.<span><i class="fa-solid fa-location-dot me-1"></i>Denver, VS</span>.<span>15 February 2023</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jbs-list-head-middle">
                                                <div class="elsocrio-jbs"><span class="text-sm-muted">Apply 02 June 2022</span></div>
                                            </div>
                                            <div class="jbs-list-head-middle">
                                                <div class="elsocrio-jbs"><span class="text-sm-muted text-light bg-success py-2 px-3 rounded">Approved</span></div>
                                            </div>
                                            <div class="jbs-list-head-last">
                                                <a href="JavaScript:Void(0);" class="btn btn-md btn-light-danger px-3 me-2"><i class="fa-solid fa-xmark"></i></a>
                                                <a href="job-detail.html" class="btn btn-md btn-light-primary px-3"><i class="fa-solid fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Single Item -->
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="jbs-list-box border">
                                        <div class="jbs-list-head">
                                            <div class="jbs-list-head-thunner">
                                                <div class="jbs-list-emp-thumb"><a href="job-detail.html"><figure><img src="https://placehold.co/200x200" class="img-fluid" alt=""></figure></a></div>
                                                <div class="jbs-list-job-caption">
                                                    <div class="jbs-job-types-wrap"><span class="label text-success bg-light-success">Full Time</span></div>
                                                    <div class="jbs-job-title-wrap"><h4><a href="job-detail.html" class="jbs-job-title">Frontend Developer</a></h4></div>
                                                    <div class="jbs-job-mrch-lists">
                                                        <div class="single-mrch-lists">
                                                            <span>Dribbble</span>.<span><i class="fa-solid fa-location-dot me-1"></i>New York, VS</span>.<span>7 March 2023</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jbs-list-head-middle">
                                                <div class="elsocrio-jbs"><span class="text-sm-muted">Apply 10 april 2022</span></div>
                                            </div>
                                            <div class="jbs-list-head-middle">
                                                <div class="elsocrio-jbs"><span class="text-sm-muted text-light bg-warning py-2 px-3 rounded">In treatment</span></div>
                                            </div>
                                            <div class="jbs-list-head-last">
                                                <a href="JavaScript:Void(0);" class="btn btn-md btn-light-danger px-3 me-2"><i class="fa-solid fa-xmark"></i></a>
                                                <a href="job-detail.html" class="btn btn-md btn-light-primary px-3"><i class="fa-solid fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Single Item -->
                                <div class="col-xl-12 col-lg-12 col-md-12">
                                    <div class="jbs-list-box border">
                                        <div class="jbs-list-head">
                                            <div class="jbs-list-head-thunner">
                                                <div class="jbs-list-emp-thumb jbs-verified"><a href="job-detail.html"><figure><img src="https://placehold.co/200x200" class="img-fluid" alt=""></figure></a></div>
                                                <div class="jbs-list-job-caption">
                                                    <div class="jbs-job-types-wrap"><span class="label text-success bg-light-success">Full Time</span></div>
                                                    <div class="jbs-job-title-wrap"><h4><a href="job-detail.html" class="jbs-job-title">Technical content Writing no.</a></h4></div>
                                                    <div class="jbs-job-mrch-lists">
                                                        <div class="single-mrch-lists">
                                                            <span>Skypen</span>.<span><i class="fa-solid fa-location-dot me-1"></i>Canada, VS</span>.<span>10 March 2022</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="jbs-list-head-middle">
                                                <div class="elsocrio-jbs"><span class="text-sm-muted">Apply 15 november 2022</span></div>
                                            </div>
                                            <div class="jbs-list-head-middle">
                                                <div class="elsocrio-jbs"><span class="text-sm-muted text-light bg-warning py-2 px-3 rounded">In treatment</span></div>
                                            </div>
                                            <div class="jbs-list-head-last">
                                                <a href="JavaScript:Void(0);" class="btn btn-md btn-light-danger px-3 me-2"><i class="fa-solid fa-xmark"></i></a>
                                                <a href="job-detail.html" class="btn btn-md btn-light-primary px-3"><i class="fa-solid fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>	
            </div>
            <!-- Header Wrap -->

        </div>
        
        <!-- footer -->
        <div class="row">
            <div class="col-md-12">
                <div class="py-3 text-center">© 2015 - 2023 Job Stock® Themezhub.</div>
            </div>
        </div>

    </div>				
    


@endsection