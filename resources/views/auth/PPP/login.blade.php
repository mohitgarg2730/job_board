{{-- {!! captcha() !!} --}}

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
<script>
  let csrf = "{{ csrf_token() }}";
  let url = "{{ url('/') }}";
</script>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    @include('partials.msg')

    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="{{ url('/') }}" class="h1"> {{ config('app.name') }}
        </a>
      </div>

      <div class="card-body" id="ppp-login-card">

        <form method="post" id="ppp-login">
          @csrf
          <div class="form-group mb-3">
            <label>Please Enter a Family Id</label>
            <input type="text" class="form-control" id="family_id" name="family_id" placeholder="Please Enter"
              value="1AAA5515">
           

            @error('family_id')
            <div class="error-message">{{ $message }}</div>

            @enderror
          </div>

          <div class="row">

            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
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
  document.querySelector('.captcha-img').addEventListener('click', function () {
      this.src = '/captcha?' + Math.random();
  });

  function validateLength(event,n) {
    const input = event.target;
    if (input.value.length > n) {
        input.value = input.value.slice(0, n);
    }
}

</script>