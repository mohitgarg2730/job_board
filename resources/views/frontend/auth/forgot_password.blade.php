@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card">
            <h3 class="card-header">{{ __('Wachtwoord opnieuw instellen') }}</h3>

            <div class="card-body">
                <form method="POST" action="{{ route('resetpassword') }}">
                    @csrf
                    <!-- Type Field (hidden) -->
                    <input type="hidden" name="type" value="{{ Request::segment(2) }}">

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('E-mailadres') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">{{ __('Indienen') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
