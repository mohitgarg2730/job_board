@extends('admin.layouts.app')
@section('content')

<main id="main" class="main">
    <div class="page-content">
          <!-- Breadcrumb Start-->
          <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Profile</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    {{-- <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add / Edit Page</li>
                    </ol> --}}
                </nav>
            </div>
            <div class="ms-auto">
                {{-- <div class="btn-group">
                    <a href="<?= url('admin/pages/list') ?>" class="btn btn-primary text-white"><i
                            class="bx bx-copy-alt"></i> Manage Pages</a>
                </div> --}}
            </div>
        </div>
        <!-- Form Start -->
        <div class="card">
            <div class="card-body">
                <div class="">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-edit">
                                    Edit Profile
                                </button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">
                                    Change Password
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content pt-2">
                            <div class="tab-pane fade profile-edit pt-3 show active" id="profile-edit">
                                <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                                    @csrf

                                    <!-- Profile Picture -->
                                    <div class="mb-3 text-center">
                                        <img src="{{ asset('/') }}{{ $user->profile_picture ??'images/5856.png' }}"
                                             alt="Profile Picture" class="rounded-circle" width="150" height="150">
                                        <div class="mt-3">
                                            <label for="profile_picture" class="form-label">Upload Profile Picture</label>
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
                                        <label for="name" class="form-label">Name</label>
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror" name="name"
                                               value="{{ old('name', $user->name) }}" required autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="d-grid gap-2">
                                        <button type="submit" class="btn btn-primary">
                                            Update Profile
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <form method="POST" action="{{ route('admin.profile.change.password') }}" enctype="multipart/form-data">
                                    @csrf

                                    <!-- Change Password Section -->
                                    <div class="card mt-5">
                                        <div class="card-header">Change Password</div>
                                        <div class="card-body">
                                            <!-- Current Password -->
                                            <div class="mb-3">
                                                <label for="current_password" class="form-label">Current Password</label>
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
                                                <label for="new_password" class="form-label">New Password</label>
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
                                                <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                                                <input id="new_password_confirmation" type="password"
                                                       class="form-control" name="new_password_confirmation">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="d-grid gap-2 mt-4">
                                        <button type="submit" class="btn btn-primary">
                                            Update
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- End Bordered Tabs -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Form End -->
    </div>
</main>





@endsection
