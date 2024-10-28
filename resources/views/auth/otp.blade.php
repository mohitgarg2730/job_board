<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    @include('partials.msg')

    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="{{ url('/') }}" class="h1"> {{ config('app.name') }}
        </a>
      </div>

      <div class="card-body">
        <p>OTP Sent to your registered mobile No. ****** {{ $phone }}.

          {{-- It is Valid for 10 min --}}
        </p>
        <form action="{{ route('otp.verify',$token) }}" method="post">

          @csrf
          <div class="input-group mb-3">
            <input type="number" class="form-control" name="otp" placeholder="Please Enter a otp" maxlength="4"  oninput="validateLength(event,4)">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-phone"></span>
              </div>
            </div>

            @error('otp')
            <div class="error-message">{{ $message }}</div>

            @enderror
          </div>

          <div class="row">

            <!-- /.col -->
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>

            </div>
            <div class="col-12 mt-2">
              <a href="{{ route('otp.resendotp',$token) }}" class="btn btn-primary btn-block">Resend OTP</a>

            </div>
            <!-- /.col -->
          </div>
        </form>


        <!-- /.social-auth-links -->


      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

</body>


</html>
<script>
function validateLength(event,n) {
    const input = event.target;
    if (input.value.length > n) {
        input.value = input.value.slice(0, n);
    }
}

</script>
