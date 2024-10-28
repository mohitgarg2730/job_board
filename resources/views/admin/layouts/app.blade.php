<?php

use Illuminate\Support\Facades\Auth;
use App\Models\User;

$useeer = Auth::user();
$useeer = User::find($useeer->id);

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title> DASHBAORD</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    {{--
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon"> --}}
    {{--
    <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon"> --}}

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/menu.css') }}" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    {{-- @include('msg.msg'); --}}
    <style>
        .main-container {
            width: 795px;
            margin-left: auto;
            margin-right: auto;
        }

        .active .nav-link {
            background-color: #0d6efd !important;
            /* Active link text color */
            color: #fff !important;
        }

        .invalid-feedback {
            display: block !important;
            width: 100%;
            margin-top: .25rem;
            font-size: .875em;
            color: var(--bs-form-invalid-color);
        }

        .error {

            color: var(--bs-form-invalid-color);
        }
    </style>

</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center" width="100%"
        style="max-height: 73px;margin-right: 29px;">

        <div class="d-flex align-items-center justify-content-between">
            <a href="#" class="logo d-flex align-items-center">
                <img src="{{ asset('new') }}/logo.png" alt="" style="max-height: 73px;margin-right: 29px;">
                <span class="d-none d-lg-block"></span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>
        <!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">


                <!-- End Search Icon-->


                <!-- End Notification Nav -->


                <!-- End Messages Nav -->

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="{{ asset('/') }}{{ $useeer->profile_picture ??'images/5856.png' }}" alt="Profile"
                            class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">{{ $useeer->name ?? "" }} </span>
                    </a>
                    <!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('admin.profile') }}">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ url('admin/logout') }}">
                                <i class="bi bi-box-arrow-right"></i>
                                <span>Sign Out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link collapsed {{ request()->is('admin/dashboard') ? 'active-li-item' : '' }}"
                    href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-grid"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed {{ request()->is('admin/cat') ? 'active-li-item' : '' }}"
                    href="{{ route('admin.cat') }}">
                    <i class="bi bi-grid"></i>
                    <span>Categeory</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed {{ request()->is('admin/type') ? 'active-li-item' : '' }}"
                    href="{{ route('admin.type') }}">
                    <i class="bi bi-grid"></i>
                    <span>Job Type</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed {{ request()->is('admin/qual') ? 'active-li-item' : '' }}"
                    href="{{ route('admin.qual') }}">
                    <i class="bi bi-grid"></i>
                    <span>Qualification</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed {{ request()->is('admin/joblevel') ? 'active-li-item' : '' }}"
                    href="{{ route('admin.joblevel') }}">
                    <i class="bi bi-grid"></i>
                    <span>Job Level</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed {{ request()->is('admin/exp') ? 'active-li-item' : '' }}"
                    href="{{ route('admin.exp') }}">
                    <i class="bi bi-grid"></i>
                    <span>Job Experience</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed {{ request()->is('admin/skill') ? 'active-li-item' : '' }}"
                    href="{{ route('admin.skill') }}">
                    <i class="bi bi-grid"></i>
                    <span>Skills</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed {{ request()->is('admin/plan/list') ? 'active-li-item' : '' }}"
                    href="{{ route('admin.plan.list') }}">
                    <i class="bi bi-grid"></i>
                    <span>Plans</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed {{ request()->is('admin/company/list') ? 'active-li-item' : '' }}"
                    href="{{ route('admin.company.list') }}">
                    <i class="bi bi-grid"></i>
                    <span>Company List</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed {{ request()->is('admin/candidate/list') ? 'active-li-item' : '' }}"
                    href="{{ route('admin.candidate.list') }}">
                    <i class="bi bi-grid"></i>
                    <span>Candidate List</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed {{ request()->is('admin/job/list') ? 'active-li-item' : '' }}"
                    href="{{ route('admin.job.list') }}">
                    <i class="bi bi-grid"></i>
                    <span>Job List</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed {{ request()->is('admin/gust/job/list') ? 'active-li-item' : '' }}"
                    href="{{ route('admin.gust.job.list') }}">
                    <i class="bi bi-grid"></i>
                    <span>Gust List</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed {{ request()->is('admin/homepages/sections') ? 'active-li-item' : '' }}"
                    href="{{ route('admin.homepages.sections') }}">
                    <i class="bi bi-grid"></i>
                    <span>HomePage</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed {{ request()->is('admin/pages/list') ? 'active-li-item' : '' }}"
                    href="{{ url('admin/menus') }}">
                    <i class="bi bi-grid"></i>
                    <span>Menus</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed {{ request()->is('admin/footer/menus') ? 'active-li-item' : '' }}"
                    href="{{ url('admin/footer/menus') }}">
                    <i class="bi bi-grid"></i>
                    <span>Footer Menu</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed {{ request()->is('admin/pages/list') ? 'active-li-item' : '' }}"
                    href="{{ url('admin/pages/list') }}">
                    <i class="bi bi-grid"></i>
                    <span>Pages</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed {{ request()->is('admin/hoempage/city/section/list') ? 'active-li-item' : '' }}"
                    href="{{ url('admin/hoempage/city/section/list') }}">
                    <i class="bi bi-grid"></i>
                    <span>Home Page City</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed {{ request()->is('admin/hoempage/company/logo/list') ? 'active-li-item' : '' }}"
                    href="{{ url('admin/hoempage/company/logo/list') }}">
                    <i class="bi bi-grid"></i>
                    <span>Home Page Company</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed {{ request()->is('admin/cookie-policy') ? 'active-li-item' : '' }}"
                    href="{{ url('admin/cookie-policy') }}">
                    <i class="bi bi-grid"></i>
                    <span>Cookie Manager</span>
            </li>
            <li class="nav-item">

                <a class="nav-link collapsed {{ request()->is('admin/blogs') ? 'active-li-item' : '' }}"
                    href="{{ url('admin/blogs') }}">
                    <i class="bi bi-grid"></i>
                    <span>Blogs</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed {{ request()->is('admin/setting') ? 'active-li-item' : '' }}"
                    href="{{ url('admin/setting') }}">
                    <i class="bi bi-grid"></i>
                    <span>Setting</span>
                </a>
            </li>



        </ul>

    </aside><!-- End Sidebar-->
    <style>
        #main-2 {
            margin-top: 60px;
            padding: 20px 30px;
            transition: all 0.3s;
            margin-left: 300px;
        }

        #main {
            margin-top: 20px;

        }
    </style>
    <script>
        $(document).ready(function() {
    // show the alert
    setTimeout(function() {
        $(".alert").alert('close');
    }, 4000);
});
    </script>



    <div id="main-2" class="main">
        @if (session('s'))

        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('s') }}
            {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button> --}}
        </div>
        @endif
        @if (session('e'))

        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('e') }}
            {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button> --}}
        </div>
        @endif

    </div>
    @yield('content')



    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </footer>


    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Template Main JS File -->
    {{-- <script src="{{ asset('assets/js/main.js') }}"></script>
    @vite('resources/js/app.js') --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Include jQuery Notify plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
    @if (session('error'))
    <script>
        let error = "{{ session('error') }}";
            $.notify(error, "error");
    </script>
    @endif
    @if (session('success'))
    <script>
        let msg = "{{ session('success') }}";

            $.notify(msg, "success");
    </script>
    @endif
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
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
    <!-- A friendly reminder to run on a server, remove this during the integration. -->
    <script>
        window.onload = function() {
        if ( window.location.protocol === "file:" ) {
            alert( "This sample requires an HTTP server. Please serve this file with a web server." );
        }
    };
    </script>

    <script>
        $(document).ready(function() {
                var currentUrl = window.location.href;

                // Loop through each navigation link
                $('#sidebar-nav .nav-item .nav-link').each(function() {
                    // Compare the link's href attribute with the current URL
                    if ($(this).attr('href') === currentUrl) {
                        // Add 'active' class to the parent <li> element
                        $(this).closest('.nav-item').addClass('active');
                    }
                });
            });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmDeletion(url) {
            Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to undo this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!',
    cancelButtonText: 'Cancel'
}).then((result) => {
    if (result.isConfirmed) {
        window.location.href = url;
    }
});

        }
    </script>

</body>

</html>