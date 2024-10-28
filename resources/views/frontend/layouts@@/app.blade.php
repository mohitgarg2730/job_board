<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ asset('frontend') }}/img/icon.png" rel="apple-touch-icon">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('frontend') }}/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('frontend') }}/css/style.css" rel="stylesheet">
    <link href="{{ asset('frontend') }}/css/responsive.css" rel="stylesheet">

</head>

<body class="index-page">
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container  position-relative d-flex align-items-center">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand logo" href="#"><img src="img/logo.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="#">Jobs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Companies</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Blog</a>
                            </li>
                            <li class="nav-item nav-item-auth">
                                <a class="nav-link " href="{{ url('candidate/login') }}">Login</a>
                            </li>
                            <li class="nav-item button-group">
                                <a class="nav-link btn btn-primary" href="#">Post a Job</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    @if(session()->has('s'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session()->get('s') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session()->has('e'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session()->get('e') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <main>




        @yield('content')










        <footer class="footer px-4 py-6 mt-8 flex flex-col border-t">
            <nav class="menu d-flex justify-content-center">
                <a href="#">RSS</a>
                <a href="#">Jobs</a>
                <a href="#">Contact Us</a>
            </nav>
            <div class="text-center mt-2">
                <p>iCAN are the industry-wide, independent<strong>
                    </strong>network that supports multicultural inclusion across the insurance sector.</p>
                <p>We promote multicultural inclusion and progression, engage with allies, and celebrate the benefits of
                    inclusion and diversity in the industry.</p>
                <p>To find out more, visit <a href="#">https://www.i-can.me/</a></p>
            </div>
            <div class="text-center mt-2">
                © Copyright 2024 iCAN. All rights reserved
            </div>
            <p class="footer-powered-by text-center mt-2"> Powered by <a href="#">JBoard</a></p>
        </footer>

    </main>

</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.bundle.min.js"></script>

<script src="{{ asset('frontend') }}//bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>


<!-- Main JS File -->
<script src="/js/main.js"></script>


<script>
    $(document).ready(function(){
        $(".category-expand-btn").click(function(){
        $(".category-list").toggleClass("category-expand");
    });
    });
</script>

</html>
