@extends('company.layouts.afterlogin')

@section('content')
<?php
    use App\Models\Categeory;

    $cat = Categeory::get()->toArray();

    ?>
<div class="dashboard-content">

    <div id="alert-container">
    </div>
    <div class="dashboard-tlbar d-block mb-4">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <h1 class="mb-1 fs-3 fw-medium">Plaats vacatures</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item text-muted"><a href="#">Werkgever</a></li>
                        <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-primary">Plaats vacatures</a></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="dashboard-widg-bar d-block">
        <div class="row">

            <div class="col-xl-12">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">



                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#profile-edit">Bewerk profiel</button>
                            </li>



                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Verander wachtwoord</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">



                            <div class="tab-pane fade profile-edit pt-3 show active " id="profile-edit">

                                <form method="POST" action="{{ route('company.update') }}" enctype="multipart/form-data"
                                    id="companyFormProfile">
                                    @csrf


                                    <!-- Profile Picture -->
                                    <div class="mb-3 text-center">
                                        <img src="{{ asset('/') }}{{ $user->profile_picture }}" alt="Profile Picture"
                                            class="rounded-circle profile_picture_img_header"  id="">
                                        <div class="mt-3">
                                            <label for="profile_picture" class="form-label">{{ __('Profielfoto
                                                uploaden') }}</label>
                                            <input id="profile_picture" type="file"
                                                class="form-control @error('profile_picture') is-invalid @enderror"
                                                name="profile_picture">

                                            @error('profile_picture')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Name -->
                                    <div class="mb-3">
                                        <label for="name" class="form-label">{{ __('Naam') }}</label>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name', $user->name) }}">
                                        <div id="name" class="error-msg"></div>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ __('E-mailadres') }}</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email', $user->email) }}" disabled>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- Mobile -->
                                    <div class="mb-3">
                                        <label for="mobile" class="form-label">{{ __('Mobiel') }}</label>
                                        <input id="mobile" type="text"
                                            class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                            value="{{ old('mobile', $user->mobile) }}" disabled>

                                        @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- Country -->
                                    <div class="mb-3">
                                        <label for="country" class="form-label">{{ __('Land') }}</label>
                                        <input id="country" type="text"
                                            class="form-control @error('country') is-invalid @enderror" name="country"
                                            value="{{ old('country', $user->country) }}">

                                        @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- City -->
                                    <div class="mb-3">
                                        <label for="city" class="form-label">{{ __('Stad') }}</label>
                                        <input id="city" type="text"
                                            class="form-control @error('city') is-invalid @enderror" name="city"
                                            value="{{ old('city', $user->city) }}">

                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- Address -->
                                    <div class="mb-3">
                                        <label for="address" class="form-label">{{ __('Adres') }}</label>
                                        <input id="address" type="text"
                                            class="form-control @error('address') is-invalid @enderror" name="address"
                                            value="{{ old('address', $user->address) }}">

                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="desc" class="form-label">{{ __('Beschrijving') }}</label>
                                        <input id="desc" type="text"
                                            class="form-control @error('desc') is-invalid @enderror" name="desc"
                                            value="{{ old('desc', $user->desc) }}">

                                        @error('desc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    {{--
                                    ======================================================================================
                                    --}}
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label>Categorie</label>
                                            <div class="select-ops">
                                                <select name="category_id" class="form-control">


                                                    <?php foreach ($cat as $key => $value) { ?>
                                                    <option value="{{ $value['id'] }}" <?php if (!empty($user->
                                                        category_id)) {
                                                        if ($value['id'] == $user->category_id) {
                                                        echo 'selected';
                                                        }
                                                        }

                                                        ?>>
                                                        {{ $value['cat_name'] }}</option>
                                                    <?php } ?>

                                                </select>

                                                @error('job_category_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="desc" class="form-label">{{ __('Bedrijfsomvang') }}</label>
                                            <input type="text"
                                                class="form-control @error('company_size') is-invalid @enderror"
                                                name="company_size"
                                                value="{{ old('company_size', $user->company_size) }}">

                                            @error('company_size')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="desc" class="form-label">{{ __('Gevestigd') }}</label>
                                            <input id="" type="text"
                                                class="form-control @error('established') is-invalid @enderror"
                                                name="established" value="{{ old('established', $user->established) }}">

                                            @error('established')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="desc" class="form-label">{{ __('Bedrijfsdiensten') }}</label>
                                            <input id="" type="text"
                                                class="form-control @error('company_service') is-invalid @enderror"
                                                name="company_service"
                                                value="{{ old('company_service', $user->company_service) }}">

                                            @error('company_service')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    {{--
                                    ======================================================================================
                                    --}}

                                    <!-- Twitter Profile Link -->
                                    <div class="mb-3">
                                        <label for="twitter_profile_link" class="form-label">{{
                                            __('Twitter-profiellink') }}</label>
                                        <input id="twitter_profile_link" type="url"
                                            class="form-control @error('twitter_profile_link') is-invalid @enderror"
                                            name="twitter_profile_link"
                                            value="{{ old('twitter_profile_link', $user->twitter_profile_link) }}">

                                        @error('twitter_profile_link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- Instagram Profile Link -->
                                    <div class="mb-3">
                                        <label for="instagram_profile_link" class="form-label">{{
                                            __('Instagram-profiellink') }}</label>
                                        <input id="instagram_profile_link" type="url"
                                            class="form-control @error('instagram_profile_link') is-invalid @enderror"
                                            name="instagram_profile_link"
                                            value="{{ old('instagram_profile_link', $user->instagram_profile_link) }}">

                                        @error('instagram_profile_link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- LinkedIn Profile Link -->
                                    <div class="mb-3">
                                        <label for="linkedin_profile_link" class="form-label">{{
                                            __('LinkedIn-profiellink') }}</label>
                                        <input id="linkedin_profile_link" type="url"
                                            class="form-control @error('linkedin_profile_link') is-invalid @enderror"
                                            name="linkedin_profile_link"
                                            value="{{ old('linkedin_profile_link', $user->linkedin_profile_link) }}">

                                        @error('linkedin_profile_link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Profiel bijwerken') }}
                                        </button>
                                    </div>
                                </form>
                            </div>


                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <form method="POST" action="{{ route('company.changepassword') }}"
                                    enctype="multipart/form-data">
                                    @csrf


                                    <!-- Change Password Section -->
                                    <div class="form card">
                                        <div class="card-header">{{ __('Verander wachtwoord') }}</div>
                                        <div class="card-body">
                                            <!-- Current Password -->
                                            <div class="mb-3">
                                                <label for="current_password" class="form-label">{{ __('huidig
                                                    ​​wachtwoord') }}</label>
                                                <input id="current_password" type="password"
                                                    class="form-control @error('current_password') is-invalid @enderror"
                                                    name="current_password">

                                                @error('current_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <!-- New Password -->
                                            <div class="mb-3">
                                                <label for="new_password" class="form-label">{{ __('nieuw paswoord')
                                                    }}</label>
                                                <input id="new_password" type="password"
                                                    class="form-control @error('new_password') is-invalid @enderror"
                                                    name="new_password">

                                                @error('new_password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>

                                            <!-- Confirm New Password -->
                                            <div class="mb-3">
                                                <label for="new_password_confirmation" class="form-label">{{
                                                    __('Bevestig nieuw wachtwoord') }}</label>
                                                <input id="new_password_confirmation" type="password"
                                                    class="form-control" name="new_password_confirmation">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="d-grid gap-2 mt-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Update') }}
                                        </button>
                                    </div>
                                </form>

                            </div>

                        </div><!-- End Bordered Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </div>
    </section>
    <script>
        $(document).ready(function () {
            $('#companyFormProfile').submit(function (e) {
                e.preventDefault();
                $('#alert-container').html('');

                // Clear existing error messages
                $('.error-msg').remove();

                var formData = new FormData(this);

                // Add the CSRF token
                formData.append('_token', "{{ csrf_token() }}");

                // Check if a file is selected and append it
                var fileInput = $('#profile_picture')[0];
                if (fileInput.files.length > 0) {
                    formData.append('profile_picture', fileInput.files[0]);
                }

                // Set up the CSRF token for AJAX requests
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('company.update') }}",
                    type: "POST",
                    data: formData,
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        console.log(data);

                    console.log(data.img);
                    if (data.img != '') {
                        // $('#profile_picture_img').attr('src', data.img);
                        $('.profile_picture_img_header').attr('src', data.img);
                    }
                    // profile_picture_img
                        // Create and show success alert
                        var successAlert = `
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                Profile successfully updated!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `;

                        $('#alert-container').html(successAlert);

                    },
                    error: function (xhr) {
                        if (xhr.status == 422) { // HTTP status 422: Unprocessable Entity
                            var errors = xhr.responseJSON.errors;
                            for (let key in errors) {
                                // Append error message below the corresponding input field
                                var errorMsg = '<div class="error-msg" style="color: red;">' + errors[key][0] + '</div>';
                                $('#' + key).after(errorMsg);
                            }
                        }
                    }
                });
                window.scrollTo({ top: 0, behavior: 'smooth' }); // Scroll to top on error
            });
        });
    </script>



    @endsection
