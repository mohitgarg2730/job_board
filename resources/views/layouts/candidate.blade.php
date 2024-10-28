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
	<link rel="icon" type="image/x-icon" href="assets/img/favicon.png">

	<!-- Custom CSS -->
	<link href="{{ asset('new') }}/assets/css/styles.css" rel="stylesheet">

	<!-- Colors CSS -->
	<link href="{{ asset('new') }}/assets/css/colors.css" rel="stylesheet">

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
						<a class="nav-brand" href="#">
							<img src="{{ asset('/new') }}/logo.png" class="logo" alt="">
						</a>
						<div class="nav-toggle"></div>
						<ul class="mobile_nav dhsbrd">
							<li>
								<div class="btn-group account-drop">
									{{-- <button type="button" class="btn btn-order-by-filt" data-bs-toggle="dropdown"
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
															class="text-success">On Job Stock</strong></p>
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
														class="fa-solid fa-circle-dollar-to-slot"></i></div>
												<div class="ntf-list-groups-caption">
													<p class="small">Khushi Verma Left A Review On <strong
															class="text-danger">Your Message</strong></p>
												</div>
											</div>
											<div class="ntf-list-groups-single">
												<a href="#" class="ntf-more">View All Notifications</a>
											</div>
										</div>
									</div> --}}
								</div>
							</li>
							<li>
								<div class="btn-group account-drop">
									<button type="button" class="btn btn-order-by-filt" data-bs-toggle="dropdown"
										aria-haspopup="true" aria-expanded="false">
										<img src="https://placehold.co/500x500" class="img-fluid circle" alt="">
									</button>
									<div class="dropdown-menu pull-right animated flipInX">
										<div class="drp_menu_headr bg-primary">
											<h4>Hi, {{ $user->name }}</h4>
											<div class="drp_menu_headr-right"><button type="button"
													class="btn btn-whites">Logout</button></div>
										</div>
										<ul>
											<li><a href="{{ url('candidate/dashboard') }}"><i
														class="fa fa-tachometer-alt"></i>Dashboard<span
														class="notti_coun style-1">4</span></a></li>
											<li><a href="{{ url('candidate/profile') }}"><i
														class="fa fa-user-tie"></i>My Profile</a></li>
											<li><a href="{{ asset( $user->resume) }}"><i class="fa fa-file"></i>My Resume<span class="notti_coun style-2">7</span></a></li>
											<li><a href="candidate-saved-jobs.html"><i
														class="fa-solid fa-bookmark"></i>Saved Resume</a></li>
											<li><a href="candidate-messages.html"><i
														class="fa fa-envelope"></i>Messages<span
														class="notti_coun style-3">3</span></a></li>
											<li><a href="{{ url('candidate/profile') }}"><i
														class="fa fa-unlock-alt"></i>Change Password</a></li>
											<li><a href="candidate-delete-account.html"><i
														class="fa-solid fa-trash-can"></i>Delete Account</a></li>
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
							</li>

							<li><a href="JavaScript:Void(0);">Pages<span class="submenu-indicator"></span></a>
								<ul class="nav-dropdown nav-submenu">
									<li><a href="about-us.html">About Us</a></li>
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
									target="_blank">Help</a></li>
							--}}
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
															class="text-success">On Job Stock</strong></p>
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
														class="fa-solid fa-circle-dollar-to-slot"></i></div>
												<div class="ntf-list-groups-caption">
													<p class="small">Khushi Verma Left A Review On <strong
															class="text-danger">Your Message</strong></p>
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
										<img src="{{ asset('/') }}{{ $user->profile_picture }}" class="img-fluid circle"
											alt="">
									</button>
									<div class="dropdown-menu pull-right animated flipInX">
										<div class="drp_menu_headr bg-primary">
											<h4>{{ $user->name }}</h4>
											<div class="drp_menu_headr-right"><button type="button"
													class="btn btn-whites">Log Out</button></div>
										</div>
										<ul>
											<li><a href="{{ url('candidate/dashboard')}}"><i
														class="fa fa-tachometer-alt"></i>Dashboard<span
														class="notti_coun style-1">4</span></a></li>
											<li><a href="{{ url('candidate/profile') }}"><i
														class="fa fa-user-tie"></i>My Profile</a></li>
											<li><a href="{{ asset( $user->resume) }}"><i class="fa fa-file"></i>My Resumes<span class="notti_coun style-2">7</span></a></li>
											<!-- <li><a href="candidate-saved-jobs.html"><i class="fa-solid fa-bookmark"></i>Opgeslagen CV</a></li>
													<li><a href="candidate-messages.html"><i class="fa fa-envelope"></i>Messages<span class="notti_coun style-3">3</span></a></li> -->
											{{-- <li><a href="{{ url('candidate/profile') }}"><i
														class="fa fa-unlock-alt"></i>Change Password</a></li>
											<li><a href="candidate-delete-account.html"><i
														class="fa-solid fa-trash-can"></i>Delete Account</a></li> --}}
										</ul>
									</div>
								</div>
							</li>
							<li class="list-buttons ms-2">
								<a href="{{ url('logout') }}"> <i
										class="fa-solid fa-arrow-right-from-bracket"></i></a>
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
									<figure><img src="{{ asset('/') }}{{ $user->profile_picture }}"
											class="img-fluid circle" alt=""></figure>
								</a>

							</div>
						</div>
						<div class="jbs-grid-usrs-caption mb-3">
							<div class="jbs-kioyer">
								<span class="label text-light theme-bg">05 Openingen</span>
							</div>
							<div class="jbs-tiosk">
								<h4 class="jbs-tiosk-title"><a href="candidate-detail.html">{{ $user->name }}</a></h4>
								<div class="jbs-tiosk-subtitle"><span>{{ $user->work_status }}</span></div>
							</div>
						</div>
					</div>
					<div class="dashboard-inner">
					<ul data-submenu-title="Main Navigation">
								<li><a href="{{url('candidate/dashboard')}}"><i class="fa-solid fa-gauge-high me-2"></i>User Dashboard</a></li>
								<li><a href="{{ url('candidate/profile') }}"><i class="fa-regular fa-user me-2"></i>My profile </a></li>
								<li><a href="{{ asset( $user->resume) }}"><i class="fa-solid fa-file-pdf me-2"></i>My Resumes</a></li>
								<li><a href="{{ url('browse-job') }}"><i class="fa-regular fa-user me-2"></i>Browse Jobs </a></li>

								<li><a href="{{ url('candidate/applyied_jobs') }}"><i class="fa-regular fa-paper-plane me-2"></i>Applied jobs</a></li>
								<li><a href="{{ url('candidate/alert_jobs') }}"><i class="fa-solid fa-bell me-2"></i>Alert Jobs<span class="count-tag bg-warning">4</span></a></li>
								<li><a href="{{ url('candidate/short_list_candidate') }}"><i class="fa-solid fa-bookmark me-2"></i>Shortlist Jobs</a></li>

								{{-- <li><a href="candidate-follow-employers.html"><i class="fa-solid fa-user-clock me-2"></i>Following Employers</a></li>
								<li><a href="candidate-messages.html"><i class="fa-solid fa-comments me-2"></i>Messages<span class="count-tag">4</span></a></li>
								<li><a href="candidate-change-password.html"><i class="fa-solid fa-unlock-keyhole me-2"></i>Change Password</a></li> --}}
								<li><a href="{{ url('candidate/delete_account') }}"><i class="fa-solid fa-trash-can me-2"></i>Delete account</a></li>
								<li><a href="{{ url('logout') }}"><i class="fa-solid fa-power-off me-2"></i>Log Out</a></li>
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

</body>

</html>

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
