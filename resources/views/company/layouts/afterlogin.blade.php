<?php

use Illuminate\Support\Facades\Auth;
use App\Models\User;

$user = Auth::user();

$user = User::find($user->id);


?>




<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Job Stock - Responsive Job Portal Bootstrap Template | ThemezHub</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('new') }}/assets/img/favicon.png">

    <!-- Custom CSS -->
    <link href="{{ asset('new') }}/assets/css/styles.css" rel="stylesheet">

    <!-- Colors CSS -->
    <link href="{{ asset('new') }}/assets/css/colors.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

</head>

<body class="green-theme">

    @include('msg.msg')
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div id="preloader">
        <div class="preloader"><span></span><span></span></div>
    </div>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
        <!-- Start Navigation -->
        <div class="header header-light head-fixed">
            <div class="container">
                <nav id="navigation" class="navigation navigation-landscape">
                    <div class="nav-header">
                        <a class="nav-brand" href="{{ url('/') }}">
                            <img src="{{ asset('new') }}/logo.png" class="logo" alt="">
                        </a>
                        <div class="nav-toggle"></div>
                        <ul class="mobile_nav dhsbrd">
                            <li>
                                <div class="btn-group account-drop">
                                    <button type="button" class="btn btn-order-by-filt" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="fa-regular fa-comments"></i><span class="noti-status"></span>
                                    </button>
                                    <div class="dropdown-menu pull-right animated flipInX">
                                        <div class="drp_menu_headr bg-primary">
                                            <h4>Notifications</h4>
                                        </div>
                                        <div class="ntf-list-groups">
                                            <div class="ntf-list-groups-single">
                                                <div class="ntf-list-groups-icon text-purple"><i
                                                        class="fa-solid fa-house-medical-circle-check"></i></div>
                                                <div class="ntf-list-groups-caption">
                                                    <p class="small"><strong>Kr. Shaury Preet</strong> Replied Your
                                                        Message</p>
                                                </div>
                                            </div>
                                            <div class="ntf-list-groups-single">
                                                <div class="ntf-list-groups-icon text-warning"><i
                                                        class="fa-solid fa-envelope"></i></div>
                                                <div class="ntf-list-groups-caption">
                                                    <p class="small">Mortin Denver Accepted Your Resume <strong
                                                            class="text-success">On Job
                                                            Stock</strong></p>
                                                </div>
                                            </div>
                                            <div class="ntf-list-groups-single">
                                                <div class="ntf-list-groups-icon text-success"><i
                                                        class="fa-solid fa-sack-dollar"></i></div>
                                                <div class="ntf-list-groups-caption">
                                                    <p class="small">Your Job #456256 Expired Yesterday <strong>View
                                                            job</strong></p>
                                                </div>
                                            </div>
                                            <div class="ntf-list-groups-single">
                                                <div class="ntf-list-groups-icon text-danger"><i
                                                        class="fa-solid fa-comments"></i></div>
                                                <div class="ntf-list-groups-caption">
                                                    <p class="small"><strong>Daniel kurwa</strong> Has Been Approved
                                                        Your Resume!.</p>
                                                </div>
                                            </div>
                                            <div class="ntf-list-groups-single">
                                                <div class="ntf-list-groups-icon text-info"><i
                                                        class="fa-solid fa-circle-dollar-to-slot"></i>
                                                </div>
                                                <div class="ntf-list-groups-caption">
                                                    <p class="small">Khushi Verma Left A Review On <strong
                                                            class="text-danger">Your
                                                            Message</strong></p>
                                                </div>
                                            </div>
                                            <div class="ntf-list-groups-single">
                                                <a href="#" class="ntf-more">View All Notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="btn-group account-drop">
                                    <button type="button" class="btn btn-order-by-filt" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <img src="{{ asset('/') }}{{ $user->profile_picture }}"
                                            class="img-fluid circle  profile_picture_img_header" alt="">

                                    </button>
                                    <div class="dropdown-menu pull-right animated flipInX">
                                        <div class="drp_menu_headr bg-primary">
                                            <h4>Hi, {{ $user->name }}</h4>
                                            <div class="drp_menu_headr-right"><a href="{{ url('logout') }}"
                                                    class="btn btn-whites">Logout</a>
                                            </div>
                                        </div>
                                        <ul>
                                            {{-- <li><a href="candidate-dashboard.html"><i
                                                        class="fa fa-tachometer-alt"></i>Dashboard<span
                                                        class="notti_coun style-1">4</span></a></li> --}}
                                            <li><a href="{{ url('company/profile') }}"><i
                                                        class="fa fa-user-tie"></i>My Profile</a></li>
                                            {{-- <li><a href="candidate-resume.html"><i class="fa fa-file"></i>My
                                                    Resume<span class="notti_coun style-2">7</span></a></li>
                                            <li><a href="candidate-saved-jobs.html"><i
                                                        class="fa-solid fa-bookmark"></i>Saved Resume</a></li>
                                            <li><a href="candidate-messages.html"><i
                                                        class="fa fa-envelope"></i>Messages<span
                                                        class="notti_coun style-3">3</span></a></li>
                                            <li><a href="candidate-change-password.html"><i
                                                        class="fa fa-unlock-alt"></i>Change Password</a>
                                            </li>
                                            <li><a href="candidate-delete-account.html"><i
                                                        class="fa-solid fa-trash-can"></i>Delete
                                                    Account</a></li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="nav-menus-wrapper" style="transition-property: none;">
                        <ul class="nav-menu">

                            {{-- <li class="active"><a href="JavaScript:Void(0);">Home<span
                                        class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a class="active" href="index.html">Home Layout 1</a></li>
                                    <li><a href="home-2.html">Home Layout 2</a></li>
                                    <li><a href="home-3.html">Home Layout 3</a></li>
                                    <li><a href="home-4.html">Home Layout 4</a></li>
                                    <li><a href="home-5.html">Home Layout 5</a></li>
                                    <li><a href="home-6.html">Home Layout 6</a></li>
                                    <li><a href="home-7.html">Home Layout 7</a></li>
                                </ul>
                            </li>

                            <li><a href="JavaScript:Void(0);">For Candidate<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="JavaScript:Void(0);">Browse Jobs<span
                                                class="submenu-indicator"></span></a>
                                        <ul class="nav-dropdown nav-submenu">
                                            <li><a href="grid-style-1.html">Job Grid Style 1</a></li>
                                            <li><a href="grid-style-2.html">Job Grid Stle 2</a></li>
                                            <li><a href="grid-style-3.html">Job Grid Style 3</a></li>
                                            <li><a href="grid-style-4.html">Job Grid Style 4</a></li>
                                            <li><a href="grid-style-5.html">Job Grid Style 5</a></li>
                                            <li><a href="full-job-grid-1.html">Grid Full Style 1</a></li>
                                            <li><a href="full-job-grid-2.html">Grid Full Style 2</a></li>
                                            <li><a href="list-style-1.html">Job List Style 1</a></li>
                                            <li><a href="list-style-2.html">Job List Style 2</a></li>
                                            <li><a href="list-style-2.html">Job List Style 3</a></li>
                                            <li><a href="full-job-list-1.html">List Full Style 1</a></li>
                                            <li><a href="full-job-list-2.html">List Full Style 2</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="JavaScript:Void(0);">Browse Map Jobs<span
                                                class="submenu-indicator"></span></a>
                                        <ul class="nav-dropdown nav-submenu">
                                            <li><a href="half-map.html">Job Search on Map 01</a></li>
                                            <li><a href="half-map-2.html">Job Search on Map 02</a></li>
                                            <li><a href="half-map-3.html">Job Search on Map 03</a></li>
                                            <li><a href="half-map-list-1.html">Job Search on Map 04</a></li>
                                            <li><a href="half-map-list-2.html">Job Search on Map 05</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="JavaScript:Void(0);">Browse Candidate<span
                                                class="submenu-indicator"></span></a>
                                        <ul class="nav-dropdown nav-submenu">
                                            <li><a href="candidate-grid-1.html">Candidate Grid 01</a></li>
                                            <li><a href="candidate-grid-2.html">Candidate Grid 02</a></li>
                                            <li><a href="candidate-list-1.html">Candidate List 01</a></li>
                                            <li><a href="candidate-list-2.html">Candidate List 02</a></li>
                                            <li><a href="candidate-half-map.html">Candidate Half Map 01</a></li>
                                            <li><a href="candidate-half-map-list.html">Candidate Half Map 02</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="JavaScript:Void(0);">Single job Detail<span
                                                class="submenu-indicator"></span></a>
                                        <ul class="nav-dropdown nav-submenu">
                                            <li><a href="single-layout-1.html">Single Layout 01</a></li>
                                            <li><a href="single-layout-2.html">Single Layout 02</a></li>
                                            <li><a href="single-layout-3.html">Single Layout 03</a></li>
                                            <li><a href="single-layout-4.html">Single Layout 04</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="JavaScript:Void(0);">Candidate Detail<span
                                                class="submenu-indicator"></span></a>
                                        <ul class="nav-dropdown nav-submenu">
                                            <li><a href="candidate-detail.html">Candidate Detail 01</a></li>
                                            <li><a href="candidate-detail-2.html">Candidate Detail 02</a></li>
                                            <li><a href="candidate-detail-3.html">Candidate Detail 03</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="advance-search.html">Advance Search</a></li>
                                    <li>
                                        <a href="candidate-dashboard.html">Candidate Dashboard<span
                                                class="new-update">New</span></a>
                                    </li>
                                </ul>
                            </li>

                            <li><a href="JavaScript:Void(0);">For Employer<span class="submenu-indicator"></span></a>
                                <ul class="nav-dropdown nav-submenu">
                                    <li><a href="JavaScript:Void(0);">Explore Employers<span
                                                class="submenu-indicator"></span></a>
                                        <ul class="nav-dropdown nav-submenu">
                                            <li><a href="employer-grid-1.html">Search Employers 01</a></li>
                                            <li><a href="employer-grid-2.html">Search Employers 02</a></li>
                                            <li><a href="employer-list-1.html">Search List Employers 01</a></li>
                                            <li><a href="employer-half-map.html">Search Employers Map</a></li>
                                            <li><a href="employer-half-map-list.html">Search List Employers Map</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="JavaScript:Void(0);">Employer Detail<span
                                                class="submenu-indicator"></span></a>
                                        <ul class="nav-dropdown nav-submenu">
                                            <li><a href="employer-detail.html">Employer Detail 01</a></li>
                                            <li><a href="employer-detail-2.html">Employer Detail 02</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="employer-dashboard.html">Employer Dashboard<span
                                                class="new-update">New</span></a>
                                    </li>
                                </ul>
                            </li> --}}

                            {{-- <li><a href="JavaScript:Void(0);">Pages<span class="submenu-indicator"></span></a> --}}
                                <ul class="nav-dropdown nav-submenu">
                                    {{-- <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="404.html">Error Page</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="blog.html">Blogs Page</a></li>
                                    <li><a href="blog-detail.html">Blog Detail</a></li>
                                    <li><a href="privacy.html">Terms & Privacy</a></li>
                                    <li><a href="pricing.html">Pricing</a></li>
                                    <li><a href="faq.html">FAQ's</a></li>
                                    <li><a href="contact.html">Contacts</a></li>
                                </ul>
                            </li>

                            <li><a href="https://getbootstrap.com/docs/5.3/getting-started/introduction/"
                                    target="_blank">Help</a>
                            </li> --}}

                        </ul>

                        <ul class="nav-menu nav-menu-social align-to-right dhsbrd">
                            {{-- <li>
                                <div class="btn-group account-drop">
                                    <button type="button" class="btn btn-order-by-filt" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="fa-regular fa-comments"></i><span class="noti-status"></span>
                                    </button>
                                    <div class="dropdown-menu pull-right animated flipInX">
                                        <div class="drp_menu_headr bg-primary">
                                            <h4>Notifications</h4>
                                        </div>
                                        <div class="ntf-list-groups">
                                            <div class="ntf-list-groups-single">
                                                <div class="ntf-list-groups-icon text-purple"><i
                                                        class="fa-solid fa-house-medical-circle-check"></i></div>
                                                <div class="ntf-list-groups-caption">
                                                    <p class="small"><strong>Kr. Shaury Preet</strong> Replied Your
                                                        Message</p>
                                                </div>
                                            </div>
                                            <div class="ntf-list-groups-single">
                                                <div class="ntf-list-groups-icon text-warning"><i
                                                        class="fa-solid fa-envelope"></i></div>
                                                <div class="ntf-list-groups-caption">
                                                    <p class="small">Mortin Denver Accepted Your Resume <strong
                                                            class="text-success">On Job
                                                            Stock</strong></p>
                                                </div>
                                            </div>
                                            <div class="ntf-list-groups-single">
                                                <div class="ntf-list-groups-icon text-success"><i
                                                        class="fa-solid fa-sack-dollar"></i></div>
                                                <div class="ntf-list-groups-caption">
                                                    <p class="small">Your Job #456256 Expired Yesterday <strong>View
                                                            job</strong></p>
                                                </div>
                                            </div>
                                            <div class="ntf-list-groups-single">
                                                <div class="ntf-list-groups-icon text-danger"><i
                                                        class="fa-solid fa-comments"></i></div>
                                                <div class="ntf-list-groups-caption">
                                                    <p class="small"><strong>Daniel kurwa</strong> Has Been Approved
                                                        Your Resume!.</p>
                                                </div>
                                            </div>
                                            <div class="ntf-list-groups-single">
                                                <div class="ntf-list-groups-icon text-info"><i
                                                        class="fa-solid fa-circle-dollar-to-slot"></i>
                                                </div>
                                                <div class="ntf-list-groups-caption">
                                                    <p class="small">Khushi Verma Left A Review On <strong
                                                            class="text-danger">Your
                                                            Message</strong></p>
                                                </div>
                                            </div>
                                            <div class="ntf-list-groups-single">
                                                <a href="#" class="ntf-more">View All Notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li> --}}
                            <li>
                                <div class="btn-group account-drop">
                                    <button type="button" class="btn btn-order-by-filt" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <img src="{{ asset('/') }}{{ $user->profile_picture }}"
                                            class="img-fluid circle profile_picture_img_header" alt="">
                                    </button>
                                    <div class="dropdown-menu pull-right animated flipInX">
                                        <div class="drp_menu_headr bg-primary">
                                            <h4>Hi, {{ $user->name }}</h4>
                                            <div class="drp_menu_headr-right"><a href="{{ url('logout') }}"
                                                    class="btn btn-whites">Logout</a>
                                            </div>
                                        </div>
                                        <ul>
                                            {{-- <li><a href="candidate-dashboard.html"><i
                                                        class="fa fa-tachometer-alt"></i>Dashboard<span
                                                        class="notti_coun style-1">4</span></a></li> --}}
                                            <li><a href="{{ url('company/profile') }}"><i
                                                        class="fa fa-user-tie"></i>My Profile</a></li>
                                            {{-- <li><a href="candidate-resume.html"><i class="fa fa-file"></i>My
                                                    Resume<span class="notti_coun style-2">7</span></a></li> --}}
                                            {{-- <li><a href="candidate-saved-jobs.html"><i
                                                        class="fa-solid fa-bookmark"></i>Saved Resume</a></li>
                                            <li><a href="candidate-messages.html"><i
                                                        class="fa fa-envelope"></i>Messages<span
                                                        class="notti_coun style-3">3</span></a></li>
                                            <li><a href="candidate-change-password.html"><i
                                                        class="fa fa-unlock-alt"></i>Change Password</a>
                                            </li> --}}
                                            {{-- <li><a href="candidate-delete-account.html"><i
                                                        class="fa-solid fa-trash-can"></i>Delete
                                                    Account</a></li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="list-buttons ms-2">
                                <a href="{{ route('company.job') }}"><i
                                        class="fa-solid fa-cloud-arrow-up me-2"></i>Post Job</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- End Navigation -->
        <div class="clearfix"></div>
        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->

        <!-- ======================= dashboard Detail ======================== -->
        <div class="dashboard-wrap bg-light">
            <a class="mobNavigation" data-bs-toggle="collapse" href="#MobNav" role="button" aria-expanded="false"
                aria-controls="MobNav">
                <i class="fas fa-bars mr-2"></i>Dashboard Navigation
            </a>
            <div class="collapse" id="MobNav">
                <div class="dashboard-nav">
                    <div class="dash-user-blocks pt-5">
                        <div class="jbs-grid-usrs-thumb">
                            <div class="jbs-grid-yuo">
                                <a href="candidate-detail.html">
                                    <figure>
                                        <img src="{{ asset('/') }}{{ $user->profile_picture }}"
                                            class="img-fluid circle profile_picture_img_header" alt="">
                                    </figure>
                                </a>
                            </div>
                        </div>
                        <div class="jbs-grid-usrs-caption mb-3">
                            <div class="jbs-kioyer">
                                <span class="label text-light theme-bg">05 Openings</span>
                            </div>
                            <div class="jbs-tiosk">
                                <h4 class="jbs-tiosk-title"><a href="candidate-detail.html">{{ $user->name }}</a></h4>
                                <div class="jbs-tiosk-subtitle"><span><i
                                            class="fa-solid fa-location-dot me-2"></i>Canada</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="dashboard-inner">
                        <ul data-submenu-title="Main Navigation">
                            <li><a href="{{ url('company/dashboard') }}"><i
                                        class="fa-solid fa-gauge-high me-2"></i>User Dashboard</a></li>
                            <li><a href="{{ url('company/profile') }}"><i
                                        class="fa-regular fa-user me-2"></i>User Profile </a></li>
                            <li><a href="{{ url('company/job/list') }}"><i
                                        class="fa-solid fa-business-time me-2"></i>My Jobs</a></li>
                            <li><a href="{{ url('company/job') }}"><i class="fa-solid fa-pen-ruler me-2"></i>Submit Jobs</a></li>
                            <li><a href="{{ route('company.applicant_applyied_jobs') }}"><i
                                        class="fa-solid fa-user-group me-2"></i>Applicants Jobs</a>
                            </li>
                            <li><a href="{{route('company.short_list_candidate')}}"><i
                                        class="fa-solid fa-user-clock me-2"></i>Shortlisted Candidates</a></li>
                            <li><a href="{{route('company.profesional_list_candidate')}}"><i
                                        class="fa-solid fa-user-clock me-2"></i>Profesional Candidates</a></li>

                            {{-- <li><a href="employer-messages.html"><i
                                        class="fa-solid fa-comments me-2"></i>Messages</a></li>
                            <li><a href="employer-change-password.html"><i
                                        class="fa-solid fa-unlock-keyhole me-2"></i>Change
                                    Password</a></li> --}}
                            <li><a href="{{ route('company.delete_account') }}"><i
                                        class="fa-solid fa-trash-can me-2"></i>Delete Account</a>
                            </li>
                            <li><a href="{{ route('company.billing.list') }}"><i
                                        class="fa-solid fa-trash-can me-2"></i>Billing History</a>
                            </li>
                            <li><a href="{{ url('company/blogs') }}"><i
                                        class="fa-solid fa-trash-can me-2"></i>Blogs</a>
                            </li>
                            <li><a href="{{ url('logout') }}"><i class="fa-solid fa-power-off me-2"></i>Log Out</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            @yield('content')
        </div>
        <!-- ======================= dashboard Detail End ======================== -->

        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('new') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('new') }}/assets/js/popper.min.js"></script>
    <script src="{{ asset('new') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('new') }}/assets/js/rangeslider.js"></script>
    <script src="{{ asset('new') }}/assets/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('new') }}/assets/js/slick.js"></script>
    <script src="{{ asset('new') }}/assets/js/counterup.min.js"></script>


    <script src="{{ asset('new') }}/assets/js/custom.js"></script>

    <!-- Morris.js charts -->
    <script src="{{ asset('new') }}/assets/js/raphael/raphael.min.js"></script>
    <script src="{{ asset('new') }}/assets/js/morris.js/morris.min.js"></script>
    <!-- Custom Chart JavaScript -->
    <script src="{{ asset('new') }}/assets/js/custom/dashboard.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    {{-- =========================== --}}
    <script>
        function confirmDeletion(url) {
            Swal.fire({
                title: 'Weet je het zeker?',
                text: "Je kunt dit niet ongedaan maken!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ja, verwijder het!',
                cancelButtonText: 'Annuleren'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        }
    </script>


    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <!-- Script JS -->
    <script>
        $('.summernote').summernote({
            placeholder: '',
            tabsize: 2,
            height: 400
        });
    </script>
    {{-- =========================== --}}
</body>

</html>