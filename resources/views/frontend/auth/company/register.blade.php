@extends('layouts.app')
@section('content')
    <?php
    use App\Models\Categeory;
    
    $cat = Categeory::get()->toArray();
    
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('company.register') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Name -->
                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Naam') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-mailadres') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mobile"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Mobiel') }}</label>

                                <div class="col-md-6">
                                    <input id="mobile" type="text"
                                        class="form-control @error('mobile') is-invalid @enderror" name="mobile"
                                        value="{{ old('mobile') }}" required autocomplete="mobile">

                                    @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mobile"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Categorie') }}</label>

                                <div class="col-md-6">
                                    <select name="category_id" class="form-control">


                                        <?php foreach ($cat as $key => $value) { ?>
                                        <option value="{{ $value['id'] }}" <?php if (!empty($user->category_id)) {
                                            if ($value['id'] == $user->category_id) {
                                                echo 'selected';
                                            }
                                        }
                                        
                                        ?>>
                                            {{ $value['cat_name'] }}</option>
                                        <?php } ?>

                                    </select>

                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="mobile"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Company size') }}</label>

                                <div class="col-md-6">

                                    <select name="company_size" class="form-control">


                                        <option value="">Select Company Size</option>
                                        <option value="0-1 employees">0-1 employees</option>
                                        <option value="2-10 employees">2-10 employees</option>
                                        <option value="11-50 employees">11-50 employees</option>
                                        <option value="51-200 employees">51-200 employees</option>
                                        <option value="201-500 employees">201-500 employees</option>
                                        <option value="500+ employees">500+ employees</option>
                                    </select>

                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>


                            {{-- ==================================================================================== --}}


                            {{-- ==================================================================================== --}}







                            <!-- Password -->
                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Wachtwoord') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('bevestig wachtwoord') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>



                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>

                        {{-- <!-- Social Media Login -->
                    <div class="mt-3">
                        <a href="{{ url('auth/google') }}" class="btn btn-danger">Register with Google</a>
                        <a href="{{ url('auth/linkedin') }}" class="btn btn-primary">Register with LinkedIn</a>
                    </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
