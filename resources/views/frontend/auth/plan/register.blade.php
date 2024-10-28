@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="container signup-container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card p-4 shadow">
                            <h3 class="text-center mb-4">Employer Sign Up</h3>
                            <p class="text-center text-muted">Please sign up or sign in to continue</p>

                            <form action="{{ url('byplan/store/'.$plan_id.'/'.$type) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <!-- Company Details Section -->
                                <div class="mb-4">
                                    <h5 class="text-center mb-4">Company Details</h5>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="upload-logo" id="profile-picture">
                                                <input type="file" id="profile_picture_file" class="d-none"
                                                    name="profile_picture" onchange="loadFile(event)">
                                                <img src="{{ asset('logo-placeholder.png') }}" alt="Company Logo"
                                                    class="img-fluid" id="logoPreview">
                                                <br>
                                                @error('profile_picture')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                                <label for="profile_picture_file" class="form-label"><span
                                                        class="btn btn-primary"> Upload logo <span></label>
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="mb-3">
                                                <label for="companyName" class="form-label">Company Name*</label>
                                                <input type="text" id="companyName" placeholder="Enter company name"
                                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                                    value="">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email*</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    placeholder="Enter your email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Account Details Section -->
                                <div class="mb-4">
                                    <h5>Your Account Details</h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="mobile" class="form-label">Mobile *</label>
                                                <input type="number" class="form-control" id="mobile"
                                                    placeholder="Enter mobile" name="mobile">
                                                @error('mobile')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="password" class="form-label">Password*</label>
                                                <input type="password" class="form-control" id="password"
                                                    placeholder="Enter password" name="password">
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="confirmPassword" class="form-label">Confirm Password*</label>
                                                <input type="password" class="form-control" id="confirmPassword"
                                                    placeholder="Confirm your password" name="password_confirmation">
                                                @error('password_confirmation')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Terms and Conditions -->
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="termsCheck">
                                    <label class="form-check-label terms" for="termsCheck">I accept the <a
                                            href="#">terms of service</a></label>
                                </div>

                                <!-- Register Button -->
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        // Image preview on file upload
        var loadFile = function(event) {
            var logoPreview = document.getElementById('logoPreview');
            logoPreview.src = URL.createObjectURL(event.target.files[0]);
            logoPreview.onload = function() {
                URL.revokeObjectURL(logoPreview.src) // free memory
            }
        };

        // Trigger file input on div click
        $(document).ready(function() {
            $('#profile-picture').click(function() {
                $('#profile_picture_file').click();
            });
        });
    </script>
@endsection
