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
      <form  action="{{ route('homeSubmit')  }}" method="post">
        @csrf
        <div class="card-body p-4" id="ppp-login-card">
          <h3 class="mb-3 text-center">Please Identify Yourself</h3>

          <div class="form-group">
            <label for="identify_yourself" class="mb-2">Select Your Role</label>
            <select class="form-control" id="identify_yourself" name="identify_yourself">
              <option value="">--Please Select--</option>
              <option value="applicant">Applicant</option>
              <option value="department">Department</option>
            </select>
          </div>

          <!-- You can add buttons or additional fields below -->
          <div class="mt-4">
            <button type="submit" class="btn btn-primary btn-block">Continue</button>
          </div>
        </div>
      </form>

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