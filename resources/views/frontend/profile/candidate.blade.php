@extends('layouts.candidate')

@section('content')
<div class="dashboard-content">
    <div class="dashboard-tlbar d-block mb-4">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12">
                <h1 class="mb-1 fs-3 fw-medium">Profile update</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item text-muted"><a href="#">Employer</a></li>
                        <li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-primary">Post Jobs</a></li>
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
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                Profile</button>
                            </li>



                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#profile-change-password">Change Password</button>
                            </li>

                        </ul>
                        <div class="tab-content pt-2">



                            <div class="tab-pane fade profile-edit pt-3 show active " id="profile-edit">

                                <form method="POST" action="{{ route('candidate.update') }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <!-- Profile Picture -->
                                    <div class="mb-3 text-center">
                                        <img src="{{ asset('/') }}{{ $user->profile_picture ??'images/5856.png' }}"
                                            alt="Profile Picture" class="rounded-circle" width="150" height="150">
                                        <div class="mt-3">
                                            <label for="profile_picture" class="form-label">{{ __('Upload Profile Picture') }}</label>
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
                                        <label for="name" class="form-label">{{ __('Name') }}</label>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name', $user->name) }}" required autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- Email -->
                                    <div class="mb-3">
                                        <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email', $user->email) }}" required>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- Mobile -->
                                    <div class="mb-3">
                                        <label for="mobile" class="form-label">{{ __('Mobile') }}</label>
                                        <input id="mobile" type="text"
                                            class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                            value="{{ old('mobile', $user->mobile) }}" required>

                                        @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <!-- Work Status -->
                                    <div class="mb-3">
                                        <label for="work_status" class="form-label">{{ __('Work Status')}}</label>

                                        <div>
                                            <select id="work_status"
                                                class="form-control @error('work_status') is-invalid @enderror"
                                                name="work_status" required>
                                                <option value="Employed">Employed</option>
                                                <option value="Unemployed">Unemployed</option>
                                                <option value="Student">Student</option>
                                            </select>

                                            @error('work_status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="work_status" class="form-label">{{ __('Skills')}}</label>

                                        <div>
                                            <select id="skills" name="skills[]" multiple="multiple"
                                                style="width: 100%;">
                                                <option value="html">HTML</option>
                                                <option value="css">CSS</option>
                                                <option value="javascript">JavaScript</option>
                                                <option value="python">Python</option>
                                                <option value="java">Java</option>
                                                <option value="csharp">C#</option>
                                                <option value="php">PHP</option>
                                            </select>

                                            @error('work_status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Resume Upload -->
                                    <div class="form-group row">
                                        <label for="resume" class="col-md-4 col-form-label text-md-right">{{ __('Upload Resume')
                                            }}</label>

                                        <div>
                                            <input id="resume" type="file"
                                                class="form-control @error('resume') is-invalid @enderror"
                                                name="resume">

                                            @error('resume')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Update Profile') }}
                                        </button>
                                    </div>
                                </form>
                            </div>


                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <form method="POST" action="{{ route('candidate.changepassword') }}"
                                    enctype="multipart/form-data">
                                    @csrf


                                    <!-- Change Password Section -->
                                    <div class="card mt-5">
                                        <div class="card-header">{{ __('Change Password') }}</div>
                                        <div class="card-body">
                                            <!-- Current Password -->
                                            <div class="mb-3">
                                                <label for="current_password" class="form-label">{{ __('Current Password') }}</label>
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
                                                <label for="new_password" class="form-label">{{ __('New Password')
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
                                                <label for="new_password_confirmation" class="form-label">{{ __('Confirm New Password') }}</label>
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
</div>

@endsection