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
<section class="page-head bg-cover" style="background:#017efa url(https://careerinenergy.nl/wp-content/uploads/2020/11/study_cover.jpg) no-repeat;" data-overlay="4">
	<div class="container">
		<div class="row">
			<div class="col-xl-8 col-lg-9 col-md-12">
				<h1 class="text-white mb-4">{{ __('about.page_title') }}</h1>
				<p class="text-white mb-4"><b>{{ __('about.platform') }}</b></p>
			</div>
		</div>
	</div>
</section>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ Our Story Start ================================== -->
<section>
	<div class="container">
		<div class="row align-items-center justify-content-between mt-5 ">
			<div class="col-lg-6 col-md-6">
				<div class="story-wrap explore-content">
					<h2>{{ __('about.we_help') }}</h2>
					<p><b>{{ __('about.digital_work') }}</b></p>
					<p class="fw-light mb-4">{{ __('about.description') }}</p>
				</div>
			</div>

			<div class="col-lg-5 col-md-6">
				<img src="{{ asset('/') }}assets/img/empoley.jpg" class="img-fluid" alt="">
			</div>

			<div class="col-lg-5 col-md-6">
				<img src="{{ asset('/') }}assets/img/empoley1.jpg" class="img-fluid" alt="">
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="story-wrap explore-content">
					<h2>{{ __('about.candidates') }}</h2>
					<p><b>{{ __('about.digital_work') }}</b></p>
					<p class="fw-light mb-4">{{ __('about.description') }}</p>
				</div>
			</div>

			<div class="col-lg-6 col-md-6">
				<div class="story-wrap explore-content">
					<h2>{{ __('about.employers') }}</h2>
					<p><b>{{ __('about.digital_work') }}</b></p>
					<p class="fw-light mb-4">{{ __('about.description') }}</p>
				</div>
			</div>

			<div class="col-lg-5 col-md-6">
				<img src="{{ asset('/') }}assets/img/empoley.jpg" class="img-fluid" alt="">
			</div>
		</div>
	</div>
</section>

<!-- ============================ Call To Action ================================== -->
<section class="bg-cover primary-bg-dark" style="background:url(assets/img/footer-bg-dark.png)no-repeat;">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-7 col-lg-10 col-md-12 col-sm-12">
				<div class="call-action-wrap">
					<div class="sec-heading center">
						<h2 class="lh-base mb-3 text-light">{{ __('about.cta_title') }}</h2>
						<p class="fs-6 text-light">{{ __('about.cta_text') }}</p>
					</div>
					<div class="call-action-buttons mt-3">
						<a href="JavaScript:Void(0);" class="btn btn-lg btn-whites fw-medium px-xl-5 px-lg-4 text-primary">{{ __('about.join_team') }}</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- ============================ Call To Action End ================================== -->

@endsection