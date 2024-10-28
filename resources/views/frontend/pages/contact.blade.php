@extends('layouts.app')

@section('content')

{{-- <!-- ============================ Page Title Start================================== -->
<section class="bg-cover primary-bg-dark" style="background:url(assets/img/bg2.png)no-repeat;">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12">

				<h2 class="ipt-title text-light">Get In touch</h2>
				<span class="text-light opacity-75">Get all latest news and updates</span>

			</div>
		</div>
	</div>
</section>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ Contact Start ================================== -->
<section>

	<div class="container">

		<div class="row justify-content-center">
			<div class="col-lg-7 col-md-10 text-center">
				<div class="sec-heading center">
					<label class="label text-success bg-light-success">Grow Your Business</label>
					<h2>Activate Next Now</h2>
					<p>Please fill the form and we will guide you to the best solution. Our experts will get in touch
						soon.</p>
				</div>
			</div>
		</div>

		<!-- row Start -->
		<div class="row align-items-center justify-content-center">
			@if(session('success'))
				<div class="alert alert-success">
					{{ session('success') }}
				</div>
			@endif
			<div class="col-lg-10 col-md-12">
				<form action="{{ route('contact') }}" method="POST">
					@csrf
					<div class="row">
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" id="name" name="name" class="form-control simple" required>
								@error('name')
									<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" id="email" name="email" class="form-control simple" required>
								@error('email')
									<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label for="subject">Subject</label>
								<input type="text" id="subject" name="subject" class="form-control simple" required>
								@error('Subject')
									<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-lg-6 col-md-6">
							<div class="form-group">
								<label for="phone">Phone</label>
								<input type="text" id="phone" name="phone" class="form-control simple" required>
								@error('phone')
									<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-lg-12 col-md-12">
							<div class="form-group">
								<label for="message">Message</label>
								<textarea id="message" name="message" class="form-control simple" rows="5"
									required></textarea>
								@error('Message')
									<div class="alert alert-danger">{{ $message }}</div>
								@enderror
							</div>
						</div>
						<div class="col-lg-12 col-md-12">
							<div class="form-group">
								<button class="btn btn-primary" type="submit">Submit Request</button>
							</div>
						</div>
					</div>
				</form>
			</div>

		</div>
		<!-- /row -->

		<!-- row Start -->
		<div class="row align-items-center justify-content-center">
			<div class="col-lg-10 col-md-12">

				<div class="ctr-jobstock-box">
					<div class="ctr-jobstock-signl">
						<div class="ctr-jobstock-signl-ico"><i class="fa-solid fa-location-dot"></i></div>
						<div class="ctr-jobstock-signl-caption">
							<h5>Hyderabad</h5>
							<p>Krishe Emerald, Whitefields, Kondapur, Hyderabad, Telangana 500081</p>
							<p>themezhub@gmail.com</p>
						</div>
					</div>
					<div class="ctr-jobstock-signl">
						<div class="ctr-jobstock-signl-ico"><i class="fa-solid fa-map-location-dot"></i></div>
						<div class="ctr-jobstock-signl-caption">
							<h5>Bengaluru</h5>
							<p>Prestige Cube, Koramangala, Bengaluru, Karnataka 560029</p>
							<p>themezhub@gmail.com</p>
						</div>
					</div>
					<div class="ctr-jobstock-signl">
						<div class="ctr-jobstock-signl-ico"><i class="fa-solid fa-map-location"></i></div>
						<div class="ctr-jobstock-signl-caption">
							<h5>Nagpur</h5>
							<p>B-101, Vedant Sapphire, Sneha Nagar, Nagpur, Maharashtra, 440015</p>
							<p>themezhub@gmail.com</p>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- /row -->

	</div>

</section>
<!-- ============================ Contact End ================================== -->

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
 --}}
{{-- 
=============================================================================================
=============================================================================================
=============================================================================================
=============================================================================================
============================================================================================= --}}
<!-- ============================ Page Title Start================================== -->
<section class="bg-cover primary-bg-dark" style="background:url(assets/img/bg2.png)no-repeat;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <h2 class="ipt-title text-light">{{ __('lang.get_in_touch') }}</h2>
                <span class="text-light opacity-75">{{ __('lang.latest_news') }}</span>
            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ Contact Start ================================== -->
<section>

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-10 text-center">
                <div class="sec-heading center">
                    <label class="label text-success bg-light-success">{{ __('lang.grow_your_business') }}</label>
                    <h2>{{ __('lang.activate_next_now') }}</h2>
                    <p>{{ __('lang.fill_form') }}</p>
                </div>
            </div>
        </div>

        <!-- row Start -->
        <div class="row align-items-center justify-content-center">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="col-lg-10 col-md-12">
                <form action="{{ route('contact') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="name">{{ __('lang.name') }}</label>
                                <input type="text" id="name" name="name" class="form-control simple" required>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="email">{{ __('lang.email') }}</label>
                                <input type="email" id="email" name="email" class="form-control simple" required>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="subject">{{ __('lang.subject') }}</label>
                                <input type="text" id="subject" name="subject" class="form-control simple" required>
                                @error('Subject')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group">
                                <label for="phone">{{ __('lang.phone') }}</label>
                                <input type="text" id="phone" name="phone" class="form-control simple" required>
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <label for="message">{{ __('lang.message') }}</label>
                                <textarea id="message" name="message" class="form-control simple" rows="5"
                                    required></textarea>
                                @error('Message')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">{{ __('lang.submit_request') }}</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /row -->

        <!-- row Start -->
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-10 col-md-12">

                <div class="ctr-jobstock-box">
                    @foreach (__('lang.locations') as $location)
                    <div class="ctr-jobstock-signl">
                        <div class="ctr-jobstock-signl-ico"><i class="fa-solid fa-location-dot"></i></div>
                        <div class="ctr-jobstock-signl-caption">
                            <h5>{{ $location['title'] }}</h5>
                            <p>{{ $location['address'] }}</p>
                            <p>themezhub@gmail.com</p>
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </div>
        <!-- /row -->

    </div>

</section>
<!-- ============================ Contact End ================================== -->

<!-- ============================ Call To Action ================================== -->
<section class="bg-cover primary-bg-dark" style="background:url(assets/img/footer-bg-dark.png)no-repeat;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-10 col-md-12 col-sm-12">

                <div class="call-action-wrap">
                    <div class="sec-heading center">
                        <h2 class="lh-base mb-3 text-light">{{ __('lang.find_perfect_job') }}</h2>
                        <p class="fs-6 text-light">{{ __('lang.job_description') }}</p>
                    </div>
                    <div class="call-action-buttons mt-3">
                        <a href="JavaScript:Void(0);"
                            class="btn btn-lg btn-whites fw-medium px-xl-5 px-lg-4 text-primary">{{ __('lang.join_team') }}</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ============================ Call To Action End ================================== -->



@endsection