@extends('layouts.app')

@section('content')

<!-- ============================================================== -->
<!-- Top header  -->
<!-- ============================================================== -->
<!-- Start Navigation -->

<!-- End Navigation -->
<div class="clearfix"></div>
<!-- ============================================================== -->
<!-- Top header  -->
<!-- ============================================================== -->

<!-- ============================ Page Title Start================================== -->
<section class="page-head bg-cover" style="background:#017efa url(https://careerinenergy.nl/wp-content/uploads/2020/11/study_cover.jpg) no-repeat;"
	data-overlay="4">

	<div class="container">
		<div class="row">
			<div class="col-xl-8 col-lg-9 col-md-12">

				<h1 class="text-white mb-4">WEB LINK</h1>
				<p class="text-white mb-4"><b>The vacancies are automatically posted online via the free Web link.</b></p>
				<p class="text-white mb-4">If you have any additional questions, we are happy to help you!</p>
				<!-- <button type="button" class="btn btn-primary fw-medium">Get In Touch</button> -->
			</div>
		</div>
	</div>
</section>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ Our Story Start ================================== -->
<section>

	<div class="container">

		<!-- row Start -->
		<!-- <div class="row align-items-center justify-content-between "> -->

			<div>
				<div class="story-wrap explore-content">

					<h2 class="text-center">Web link</h2>
					<p class="fw-light mb-4">Placing vacancies is a time-consuming activity. Because we know how valuable your time is, we offer the possibility of fully automated placement of vacancies. We have specialists ready who can create a web link so that your vacancies are placed online on Career in Energy in a fully automated manner. This offer is synchronized every day. This ensures that you always have a current and up-to-date offer of vacancies online on Career in Energy. You can spend this valuable time on hiring new talent. </p>
					<!-- <button type="button" class="btn fw-medium btn-primary">Start Today Now</button> -->
				</div>
				<a href="{{ url('contact-us') }}"><strong>One site for all your energy vacancies</strong></a>
			</div>
		<!-- </div> -->
		<!-- /row -->

		<!-- row Start -->
		<div class="mt-5">
				<div class="story-wrap explore-content">
					<h2 class="text-center">UNLIMITED POSTING OF VACANCIES</h2>
					<p class="fw-light mb-4">Trouble finding the right candidate? We are happy to help you.  Do you have a large number of vacancies available? Then you can have these vacancies automatically posted on Career in Energy.nl via direct link or multiposting. You no longer have to add vacancies manually. Of course, this saves you a lot of valuable time. We like to work with multiposting parties, but we can also directly realize the link between your website and ours. </p>
					<!-- <button type="button" class="btn fw-medium btn-primary">Start Today Now</button> -->
				</div>
				<a href="{{ url('contact-us') }}"><strong>DIRECT CONTACT</strong></a>
			</div>
		<!-- /row -->

		<!-- row Start -->
		<div class="mt-5">
				<div class="story-wrap explore-content">
					<h2 class="text-center">Automatic job posting & multiposting</h2>
					<p class="fw-light mb-4">With a vacancy year subscription we place all your healthcare vacancies on CareerinEnergy.nl. We prefer to place your vacancies online automatically. This can be done via a multiposter, an XML feed or via our web link. Ideal if you want to draw attention to your open vacancies all year round. </p>
					<!-- <button type="button" class="btn fw-medium btn-primary">Start Today Now</button> -->
				</div>
				<a href="{{ url('contact-us') }}"><strong>One site for all your energy vacancies</strong></a>
			</div>
		<!-- /row -->
		 <!-- row Start -->
		<div class="mt-5">
				<div class="story-wrap explore-content">
					<h2 class="text-center">Realization of web link</h2>
					<p class="fw-light mb-4">The placement of the vacancies is realized by means of an automatic data link. For the link we would like to receive a data feed. At the end of the introductory period we will draw up a report with all relevant metrics.<br>What we need for a link is simple. We would like to receive an online available structured data file (e.g. an XML, RSS or ATOM file), which we can link to the Career in Energy website. If such a structured data file is not available online, the vacancies could also be retrieved via an HTTP REST API. If necessary, we can also place vacancies manually.<br>We would like to see the following fields included in the database. For questions about the link, you can always contact our ICT department.  </p>
					<!-- <button type="button" class="btn fw-medium btn-primary">Start Today Now</button> -->
				</div>
				<p><strong>Fields required:</strong></p>
						<p>1. Job title</p>
						<p>2. General description of the function (may be 1 field, may be separate parts)</p>
						<p>3. Direct link to the vacancy
						</p>
						<p>4. Link to the apply directly page</p>
						<p>5. Function: – Full-time, Part-time, Internship, Self-employed, Project-based</p>
						<p>6. Amount (Salary, if negotiable indicate field with 0)</p>
						<p>7. Location: (Map-lat and Map-log)</p>
						<p>8. Vacancy expiration date</p>
						<p>9. Date posted</p>
						<p>10. Province</p>
						<p>11. Experience (MBO, HBO, WO, Vocational training)</p>
						<p>12. Hours contract</p>
			</div>
		<!-- /row -->

	</div>

</section>
<!-- ============================ Our Story End ================================== -->

<!-- ================= Our Team================= -->
<!-- <section class="gray-simple">
	<div class="container">

		<div class="row">
			<div class="col-lg-12 col-md-12">
				<div class="sec-heading center">
					<h2>Meet Our Team</h2>
					<p>Professional & Dedicated Team</p>
				</div>
			</div>
		</div>

		<div class="row gx-3 gy-4"> -->

<!-- Single Teamm -->
<!-- <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
				<div class="team-grid">

					<div class="teamgrid-user">
						<img src="https://placehold.co/500x500" alt="" class="img-fluid" />
					</div>

					<div class="teamgrid-content">
						<h4>Shaurya Preet</h4>
						<span class="text-primary">Co-Founder</span>
					</div>

				</div>
			</div> -->

<!-- Single Teamm -->
<!-- <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
				<div class="team-grid">

					<div class="teamgrid-user">
						<img src="https://placehold.co/500x500" alt="" class="img-fluid" />
					</div>

					<div class="teamgrid-content">
						<h4>Shivangi Preet</h4>
						<span class="text-primary">Content Writer</span>
					</div>

				</div>
			</div> -->

<!-- Single Teamm -->
<!-- <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
				<div class="team-grid">

					<div class="teamgrid-user">
						<img src="https://placehold.co/500x500" alt="" class="img-fluid" />
					</div>

					<div class="teamgrid-content">
						<h4>Yash Preet</h4>
						<span class="text-primary">Content Writer</span>
					</div>

				</div>
			</div> -->

<!-- Single Teamm -->
<!-- <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
				<div class="team-grid">

					<div class="teamgrid-user">
						<img src="https://placehold.co/500x500" alt="" class="img-fluid" />
					</div>

					<div class="teamgrid-content">
						<h4>Dhananjay Preet</h4>
						<span class="text-primary">CEO & Manager</span>
					</div>

				</div>
			</div> -->

<!-- Single Teamm -->
<!-- <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
				<div class="team-grid">

					<div class="teamgrid-user">
						<img src="https://placehold.co/500x500" alt="" class="img-fluid" />
					</div>

					<div class="teamgrid-content">
						<h4>Rahul Gilkrist</h4>
						<span class="text-primary">App Designer</span>
					</div>

				</div>
			</div> -->

<!-- Single Teamm -->
<!-- <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
				<div class="team-grid">

					<div class="teamgrid-user">
						<img src="https://placehold.co/500x500" alt="" class="img-fluid" />
					</div>

					<div class="teamgrid-content">
						<h4>Adam Wilcard</h4>
						<span class="text-primary">Web Developer</span>
					</div>

				</div>
			</div> -->

<!-- Single Teamm -->
<!-- <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
				<div class="team-grid">

					<div class="teamgrid-user">
						<img src="https://placehold.co/500x500" alt="" class="img-fluid" />
					</div>

					<div class="teamgrid-content">
						<h4>Adam Wilcard</h4>
						<span class="text-primary">Web Developer</span>
					</div>

				</div>
			</div> -->

<!-- Single Teamm -->
<!-- <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6">
				<div class="team-grid">

					<div class="teamgrid-user">
						<img src="https://placehold.co/500x500" alt="" class="img-fluid" />
					</div>

					<div class="teamgrid-content">
						<h4>Adam Wilcard</h4>
						<span class="text-primary">Web Developer</span>
					</div>

				</div>
			</div>
		</div>

	</div>
</section> -->
<!-- =============================== Our Team ================================== -->

<!-- ============================ Valuable Step Start ================================== -->
<!-- <section class="primary-bg-dark">
	<div class="container">

		<div class="row justify-content-center">
			<div class="col-xl-6 col-lg-7 col-md-10 text-center">
				<div class="sec-heading center light">
					<h2>Choose What You Need</h2>
					<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
						deleniti atque corrupti quos dolores</p>
				</div>
			</div>
		</div>

		<div class="row align-items-center gx-4 gy-4">

			<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
				<div class="jobstock-posted-box-y78 colored">
					<div class="jobstock-posted-body-y78">
						<div class="serv-ctr-title">
							<h2 class="primary-2-cl">01.</h2>
						</div>
						<div class="serv-ctr-subtitle">
							<h5 class="text-light">Create An Account</h5>
						</div>
						<div class="serv-ctr-decs">
							<p class="text-light opacity-75">Post A Job To Tell Us About Your Project. We'll Quickly
								Match You With The Right Freelancers Find Place Best. Nor again is there anyone who
								loves.</p>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
				<div class="jobstock-posted-box-y78 colored">
					<div class="jobstock-posted-body-y78">
						<div class="serv-ctr-title">
							<h2 class="primary-2-cl">02.</h2>
						</div>
						<div class="serv-ctr-subtitle">
							<h5 class="text-light">Search Jobs</h5>
						</div>
						<div class="serv-ctr-decs">
							<p class="text-light opacity-75">Post A Job To Tell Us About Your Project. We'll Quickly
								Match You With The Right Freelancers Find Place Best. Nor again is there anyone who
								loves.</p>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
				<div class="jobstock-posted-box-y78 colored">
					<div class="jobstock-posted-body-y78">
						<div class="serv-ctr-title">
							<h2 class="primary-2-cl">03.</h2>
						</div>
						<div class="serv-ctr-subtitle">
							<h5 class="text-light">Save & Apply Jobs</h5>
						</div>
						<div class="serv-ctr-decs">
							<p class="text-light opacity-75">Post A Job To Tell Us About Your Project. We'll Quickly
								Match You With The Right Freelancers Find Place Best. Nor again is there anyone who
								loves.</p>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>
</section> -->
<!-- ============================ Valuable Step End ================================== -->


<!-- ============================ Good Reviews By Customers ================================== -->
<!-- <section>
	<div class="container">

		<div class="row justify-content-center">
			<div class="col-lg-7 col-md-10 text-center">
				<div class="sec-heading center">
					<h2>Good Reviews By Customers</h2>
					<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
						deleniti atque corrupti quos dolores</p>
				</div>
			</div>
		</div>

		<div class="row justify-content-center gx-4 gy-4"> -->

<!-- Single Review -->
<!-- <div class="col-xl-4 col-lg-4 col-md-6">
				<div class="jobstock-reviews-box">
					<div class="jobstock-reviews-desc">
						<h6 class="review-title-yui">"The best useful website"</h6>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
							labore et dolore magna aliqua. Ut enim ad minim.</p>
					</div>
					<div class="jobstock-reviews-flex">
						<div class="jobstock-reviews-thumb">
							<div class="jobstock-reviews-figure"><img src="https://placehold.co/500x500"
									class="img-fluid circle" alt=""></div>
						</div>
						<div class="jobstock-reviews-caption">
							<div class="jobstock-reviews-title">
								<h4>Lucia E. Nugent</h4>
							</div>
							<div class="jobstock-reviews-designation"><span>CEO of Climber</span></div>
							<div class="jobstock-reviews-rates">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star deactive"></i>
							</div>
						</div>
					</div>
				</div>
			</div> -->

<!-- Single Review -->
<!-- <div class="col-xl-4 col-lg-4 col-md-6">
	<div class="jobstock-reviews-box">
		<div class="jobstock-reviews-desc">
			<h6 class="review-title-yui">"Ranking is the #1"</h6>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
				labore et dolore magna aliqua. Ut enim ad minim.</p>
		</div>
		<div class="jobstock-reviews-flex">
			<div class="jobstock-reviews-thumb">
				<div class="jobstock-reviews-figure"><img src="https://placehold.co/500x500" class="img-fluid circle"
						alt=""></div>
			</div>
			<div class="jobstock-reviews-caption">
				<div class="jobstock-reviews-title">
					<h4>Brenda R. Smith</h4>
				</div>
				<div class="jobstock-reviews-designation"><span>Founder of Yeloower</span></div>
				<div class="jobstock-reviews-rates">
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
				</div>
			</div>
		</div>
	</div>
</div> -->

<!-- Single Review -->
<!-- <div class="col-xl-4 col-lg-4 col-md-6">
	<div class="jobstock-reviews-box">
		<div class="jobstock-reviews-desc">
			<h6 class="review-title-yui">"The website is eco friendly"</h6>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
				labore et dolore magna aliqua. Ut enim ad minim.</p>
		</div>
		<div class="jobstock-reviews-flex">
			<div class="jobstock-reviews-thumb">
				<div class="jobstock-reviews-figure"><img src="https://placehold.co/500x500" class="img-fluid circle"
						alt=""></div>
			</div>
			<div class="jobstock-reviews-caption">
				<div class="jobstock-reviews-title">
					<h4>Brian B. Wilkerson</h4>
				</div>
				<div class="jobstock-reviews-designation"><span>CEO of Mark Soft</span></div>
				<div class="jobstock-reviews-rates">
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
				</div>
			</div>
		</div>
	</div>
</div> -->

<!-- Single Review -->
<!-- <div class="col-xl-4 col-lg-4 col-md-6">
	<div class="jobstock-reviews-box">
		<div class="jobstock-reviews-desc">
			<h6 class="review-title-yui">"100% save and secure website"</h6>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
				labore et dolore magna aliqua. Ut enim ad minim.</p>
		</div>
		<div class="jobstock-reviews-flex">
			<div class="jobstock-reviews-thumb">
				<div class="jobstock-reviews-figure"><img src="https://placehold.co/500x500" class="img-fluid circle"
						alt=""></div>
			</div>
			<div class="jobstock-reviews-caption">
				<div class="jobstock-reviews-title">
					<h4>Miguel L. Benbow</h4>
				</div>
				<div class="jobstock-reviews-designation"><span>Founder of Mitche LTD</span></div>
				<div class="jobstock-reviews-rates">
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star deactive"></i>
				</div>
			</div>
		</div>
	</div>
</div> -->

<!-- Single Review -->
<!-- <div class="col-xl-4 col-lg-4 col-md-6">
	<div class="jobstock-reviews-box">
		<div class="jobstock-reviews-desc">
			<h6 class="review-title-yui">"Very developer friendly website"</h6>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
				labore et dolore magna aliqua. Ut enim ad minim.</p>
		</div>
		<div class="jobstock-reviews-flex">
			<div class="jobstock-reviews-thumb">
				<div class="jobstock-reviews-figure"><img src="https://placehold.co/500x500" class="img-fluid circle"
						alt=""></div>
			</div>
			<div class="jobstock-reviews-caption">
				<div class="jobstock-reviews-title">
					<h4>Hilda A. Sheppard</h4>
				</div>
				<div class="jobstock-reviews-designation"><span>CEO of Doodle</span></div>
				<div class="jobstock-reviews-rates">
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
					<i class="fa-solid fa-star"></i>
				</div>
			</div>
		</div>
	</div>
</div>

</div>

</div>
</section> -->
<!-- ============================ Good Reviews By Customers ================================== -->


<!-- ============================ Call To Action ================================== -->
<section class="bg-cover primary-bg-dark" style="background:url(assets/img/footer-bg-dark.png)no-repeat;">
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
						<!-- <a href="JavaScript:Void(0);" class="btn btn-lg btn-dark fw-medium px-xl-5 px-lg-4 me-2">Upload
							resume</a> -->
						<a href="JavaScript:Void(0);"
							class="btn btn-lg btn-whites fw-medium px-xl-5 px-lg-4 text-primary">Join Our Team</a>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>
<!-- ============================ Call To Action End ================================== -->
@endsection