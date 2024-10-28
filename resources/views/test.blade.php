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

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        @include('partials.msg')

        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ url('/') }}" class="h1"> {{ config('app.name') }}
                </a>
            </div>

            <form method="POST" action="{{ url('login') }}">
                @csrf
                <input type="text" name="familyID" placeholder="Enter Family ID">
                <button type="submit">Login</button>
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