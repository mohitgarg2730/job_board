<?php
use App\Models\SettingModel;

$ss = SettingModel::find(1);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Job Stock - Responsive Job Portal Bootstrap Template | ThemezHub</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('new') }}/assets/img/favicon.png">

    <!-- Custom CSS -->
    <link href="{{ asset('new') }}/assets/css/styles.css" rel="stylesheet">

    <!-- Colors CSS -->
    <link href="{{ asset('new') }}/assets/css/colors.css" rel="stylesheet">

</head>

<body class="green-theme">
    <style>
        .invalid-feedback-error {
            color: red !important;
        }

        .carousel-item {
            padding: 15px;
            background: #f9f9f9;
            border-radius: 5px;
        }

        .job-instructor-layout {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            background-color: #fff;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            background-color: rgba(0, 0, 0, 0.5);
            /* Customize control button background */
        }
    </style>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div id="preloader">
        <div class="preloader"><span></span><span></span></div>
    </div>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        <!-- ============================================================== -->
        <!-- Top header  -->
        <!-- ============================================================== -->
        <!-- Start Navigation -->
        <div class="header header-light">
            <div class="container">
                <nav id="navigation" class="navigation navigation-landscape">
                    <div class="nav-header">
                        <a class="nav-brand" href="{{ url('/') }}"><img src="{{ asset('new') }}/logo.png"
                                class="logo" alt=""></a>
                        {{-- <h4>CAREER IN ENERGY</h4> --}}
                        <div class="nav-toggle"></div>
                        <div class="mobile_nav">
                            <ul>
                                <li class="list-buttons">
                                    <a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#login"><i
                                            class="fas fa-sign-in-alt me-2"></i>
                                        Log in
                                        {{ __('lang.log_in') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="nav-menus-wrapper" style="transition-property: none;">
                        <ul class="nav-menu">

                            <li class="active"><a href="JavaScript:Void(0);">{{ __('lang.home') }}<span
                                        class="submenu-indicator"></span></a>

                            </li>



                            <li><a href="{{ url('browse-job') }}" target="_blank">{{ __('lang.browse_job') }} </a></li>
                            <li><a href="{{ url('/companies') }}" target="_blank">{{ __('lang.companies') }} </a></li>
                            <li><a href="{{ url('/') }}" target="_blank">{{ __('lang.profile') }} </a></li>
                            <li><a href="{{ url('/') }}" target="_blank">{{ __('lang.pricing') }} </a></li>
                            <li><a href="{{ url('/all/blogs') }}" target="_blank">{{ __('lang.blog') }} </a></li>
                            <li><a href="JavaScript:Void(0);" data-bs-toggle="modal"
                                    data-bs-target="#login">{{ __('lang.my_account') }} </a></li>
                            {{-- <li><a href="{{ url('about-us') }}" target="_blank">{{ __('lang.about_us') }}</a></li>
                            <li><a href="{{ url('contact-us') }}" target="_blank">{{ __('lang.contact_us') }}</a></li> --}}
                            <li class="nav-submenu-open">
                                <a href="JavaScript:Void(0);" contenteditable="false" style="cursor: pointer;">

                                    <?php $lang = Session::get('locale');
                                    
                                    
                                    if ($lang == 'en') {
                                        echo 'English';
                                    } elseif ($lang == 'nl') {
                                        echo 'Dutch';
                                    }
                                    else
                                    {
                                        echo 'English';

                                    }
                                    
                                    ?>




                                    <span class="submenu-indicator"><span
                                            class="submenu-indicator-chevron"></span></span></a>
                                <ul class="nav-dropdown nav-submenu" style="right: auto; display: block;">

                                    <li><a href="{{ route('set-locale', ['locale' => 'en']) }}" contenteditable="false"
                                            style="cursor: pointer;">English</a></li>
                                    <li><a href="{{ route('set-locale', ['locale' => 'nl']) }}" contenteditable="false"
                                            style="cursor: pointer;">Dutch</a></li>


                                </ul>
                            </li>
                        </ul>

                        <ul class="nav-menu nav-menu-social align-to-right">
                            <li>
                                {{-- <a href="JavaScript:Void(0);" data-bs-toggle="modal" data-bs-target="#login"><i
                                        class="fas fa-sign-in-alt me-2"></i>{{ __('lang.register') }}</a> --}}

                                <a href="{{ url('/gust/job/add') }}" target="_blank"
                                    class="btn btn-primary post_vacncy_btn">{{ __('lang.post_a_vacancy') }}</a>
                            </li>

                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        @include('msg.msg')

        @yield('content')

        <!-- ============================ Footer Start ================================== -->
        <footer class="footer skin-light-footer">
            <div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <div class="footer-widget">
                                <a href="{{ url('/') }}"><img src="{{ asset('new/logo.png') }}"
                                        class="img-footer" alt=""></a>
                                <div class="footer-add">
                                    <p>Collins Street West, Victoria Near Bank Road<br>Australia QHR12456.</p>
                                </div>
                                <div class="foot-socials">
                                    <ul>
                                        <li><a href="{{ $ss->fb_link ?? '' }}"><i
                                                    class="fa-brands fa-facebook"></i></a></li>
                                        <li><a href="{{ $ss->li_link ?? '' }}"><i
                                                    class="fa-brands fa-linkedin"></i></a></li>
                                        <li><a href="{{ $ss->tw_link ?? '' }}"><i class="fa-brands fa-twitter"></i></a>
                                        </li>
                                        <li><a href="{{ $ss->in_link ?? '' }}"><i
                                                    class="fa-brands fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-4">
                            <div class="footer-widget">
                                <h4 class="widget-title text-primary">{{ __('lang.for_clients') }}</h4>
                                <ul class="footer-menu">
                                    <li><a href="#">{{ __('lang.browse_job') }}</a></li>
                                    <li><a href="#">{{ __('lang.payroll_services') }}</a></li>
                                    <li><a href="#">{{ __('lang.direct_contracts') }}</a></li>
                                    <li><a href="#">{{ __('lang.hire_worldwide') }}</a></li>
                                    <li><a href="#">{{ __('lang.hire_in_usa') }}</a></li>
                                    <li><a href="#">{{ __('lang.how_to_hire') }}</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-4">
                            <div class="footer-widget">
                                <h4 class="widget-title text-primary">{{ __('lang.employers') }}</h4>
                                <ul class="footer-menu">
                                    <li><a href="{{ url('employers') }}">{{ __('lang.employers') }}</a></li>
                                    <li><a href="{{ url('weblink') }}">{{ __('lang.weblink') }}</a></li>
                                    <li><a href="{{ url('partners') }}">{{ __('lang.partners') }}</a></li>
                                    <li><a href="{{ url('posting-vacancy') }}">{{ __('lang.post_vacancy') }}</a></li>
                                    <li><a href="#">{{ __('lang.resources') }}</a></li>
                                    <li><a href="#">{{ __('lang.help_support') }}</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-6">
                            <div class="footer-widget">
                                <h4 class="widget-title text-primary">{{ __('lang.company') }}</h4>
                                <ul class="footer-menu">
                                    <li><a href="{{ url('about-us') }}">{{ __('lang.about_us') }}</a></li>
                                    <li><a href="#">{{ __('lang.leadership') }}</a></li>
                                    <li><a href="{{ url('contact-us') }}">{{ __('lang.contact_us') }}</a></li>
                                    <li><a href="#">{{ __('lang.investor_relations') }}</a></li>
                                    <li><a href="#">{{ __('lang.trust_safety') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!-- ============================ Footer End ================================== -->

        <!-- Log In Modal -->
        <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="registermodal"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
                <div class="modal-content" id="registermodal">
                    <span class="mod-close" data-bs-dismiss="modal" aria-hidden="true"><i
                            class="fas fa-close"></i></span>
                    <div class="modal-header">
                        <div class="mdl-thumb"><img src="{{ asset('new') }}/logo.png" class="img-fluid"
                                width="70" alt="" style="width :314px"></div>
                        {{-- <div class="mdl-title">
                            <h4 class="modal-header-title">Hello, Again</h4>
                        </div> --}}
                    </div>
                    <div class="modal-body">

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="candidate-tab" data-bs-toggle="tab" href="#candidate"
                                    role="tab" aria-controls="candidate" aria-selected="false">Candidate</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="company-tab" data-bs-toggle="tab" href="#company"
                                    role="tab" aria-controls="company" aria-selected="true">company</a>
                            </li>


                        </ul>
                        <div class="tab-content" id="myTabContent">

                            {{-- ==========candidate tab tabs==================== --}}

                            <div class="tab-pane fade show active" id="candidate" role="tabpanel"
                                aria-labelledby="candidate-tab">
                                <div class="modal-login-form">
                                    <form method="POST" action="{{ route('candidate.login') }}">
                                        @csrf

                                        <!-- Email Address -->
                                        <div class="mb-3">
                                            <label for="email"
                                                class="form-label">{{ __('E-Mail Address') }}</label>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <!-- Password -->
                                        <div class="mb-3">
                                            <label for="password" class="form-label">{{ __('Password') }}</label>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <!-- Remember Me -->
                                        <div class="mb-3 form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                id="remember">
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>

                                        <!-- Submit Button -->
                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Log in') }}
                                            </button>
                                            <div class="text-center">OR</div>
                                            <a href="{{ route('candidate.register') }}" class="btn btn-primary">
                                                {{ __('Register') }}
                                            </a>
                                            <br>
                                            <div class="modal-flex-item mb-3">
                                                <div class="modal-flex-first">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="checkbox"
                                                            id="savepassword" value="option1">
                                                        <!-- <label class="form-check-label" for="savepassword">Save
                                                        Password</label> -->
                                                    </div>
                                                </div>
                                                <div class="modal-flex-last">
                                                    <a href="{{ route('password.request') }}">Forget Password?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="social-login">
                                    <ul>
                                        <li><a href="#" class="btn connect-fb" id="facebooklogin"><i
                                                    class="fa-brands fa-facebook"></i>Facebook</a></li>
                                        <li><a href="#" class="btn connect-google"id="googleLogin"><i
                                                    class="fa-brands fa-google"></i>Google+</a></li>
                                    </ul>
                                </div>

                            </div>


                            {{-- ==========company tabs==================== --}}
                            <div class="tab-pane fade" id="company" role="tabpanel" aria-labelledby="company-tab">
                                <div class="modal-login-form">
                                    <form method="POST" action="{{ route('company.login') }}">
                                        @csrf

                                        <div class="form-floating mb-4">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <label>User Name</label>
                                        </div>

                                        <div class="form-floating mb-4">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label>Password</label>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit"
                                                class="btn btn-primary full-width font--bold btn-lg">Log
                                                in</button>

                                            <div class="text-center">OR</div>
                                            <a href="{{ route('company.register') }}"
                                                class="btn btn-primary full-width font--bold btn-lg">
                                                {{ __('Register') }}
                                            </a>
                                            <br>


                                        </div>

                                        <div class="modal-flex-item mb-3">
                                            <div class="modal-flex-first">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="checkbox" id="savepassword"
                                                        value="option1">
                                                    <label class="form-check-label" for="savepassword">Save
                                                        Password</label>
                                                </div>
                                            </div>
                                            <div class="modal-flex-last">
                                                <a href="{{ route('password.request') }}">Forget Password?</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="social-login">
                                    <ul>
                                        <li><a href="#" class="btn connect-fb" id="facebooklogin"><i
                                                    class="fa-brands fa-facebook"></i>Facebook</a></li>
                                        <li><a href="#" class="btn connect-google"id="googleLogin"><i
                                                    class="fa-brands fa-google"></i>Google+</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <p>Don't have an account yet?<a href="signup.html" class="text-primary font--bold ms-1">Sign
                                Up</a></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->

        <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>


    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="{{ asset('new') }}/assets/js/jquery.min.js"></script>
    <script src="{{ asset('new') }}/assets/js/popper.min.js"></script>
    <script src="{{ asset('new') }}/assets/js/bootstrap.min.js"></script>
    <script src="{{ asset('new') }}/assets/js/rangeslider.js"></script>
    <script src="{{ asset('new') }}/assets/js/jquery.nice-select.min.js"></script>
    <script src="{{ asset('new') }}/assets/js/slick.js"></script>
    <script src="{{ asset('new') }}/assets/js/counterup.min.js"></script>


    <script src="{{ asset('new') }}/assets/js/custom.js"></script>
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/7.19.0/firebase-app.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/7.19.0/firebase-analytics.js"></script>
    <script defer src="https://www.gstatic.com/firebasejs/7.19.0/firebase-auth.js"></script>

    <script>
        // Your web app's Firebase configuration
        var firebaseConfig = {
            apiKey: "AIzaSyALOz-A1J1vhXIdjtVs6dWv_G3KU6G-Bco",
            authDomain: "withphp-b78a3.firebaseapp.com",
            databaseURL: "https://withphp-b78a3-default-rtdb.firebaseio.com",
            projectId: "withphp-b78a3",
            storageBucket: "withphp-b78a3.appspot.com",
            messagingSenderId: "1056089747052",
            appId: "1:1056089747052:web:ce319142b28b8785cc3249",
            measurementId: "G-7T335H37HD"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        console.log("firebase configure")
        firebase.analytics();

        var signupbtn = document.getElementById("signupbtn")
        var emailsignup = document.getElementById("useremail")
        var passswordsignup = document.getElementById("userpass")


        //================Signup With Email and Password==========================
        //   signupbtn.onclick=function(){
        //       signupbtn.disabled=true;
        //       signupbtn.textContent="Registering Your Account! Please Wait";
        //       firebase.auth().createUserWithEmailAndPassword(emailsignup.value,passswordsignup.value).then(function(response){
        //         sendingVerifyEmail(signupbtn);
        //             console.log(response);
        //       })
        //       .catch(function(error){
        //         signupbtn.disabled=false;
        //         signupbtn.textContent="Sign Up";
        //           console.log(error);
        //       })


        //   }

        //   function sendingVerifyEmail(button){
        //      firebase.auth().currentUser.sendEmailVerification().then(function(response){
        //                 signupbtn.disabled=false;
        //         signupbtn.textContent="Sign Up S";

        //         console.log(response);
        //      })
        //      .catch(function(error){
        //                 signupbtn.disabled=false;
        //         signupbtn.textContent="Sign Up S";

        //          console.log(error);
        //      })
        //   }
        //================End Signup With Email and Password======================

        //==========================Sign in With Email and Password============================

        //    var loginemail=document.getElementById("inputEmail");
        //    var loginpassword=document.getElementById("inputPassword");
        //    var loginbtn=document.getElementById("loginbtn");


        //    loginbtn.onclick=function(){
        //     loginbtn.disabled=true;
        //     loginbtn.textContent="Logging In Please Wait.."
        //        firebase.auth().signInWithEmailAndPassword(loginemail.value,loginpassword.value).then(function(response){
        //            console.log(response);
        //            loginbtn.disabled=false;
        //     loginbtn.textContent="Sign In"
        //             var userobj=response.user;
        //             var token=userobj.xa;
        //             var provider="email";
        //             var email=loginemail.value;
        //             if(token!=null && token!=undefined && token!=""){
        //             sendDatatoServerPhp(email,provider,token,email);
        //             }
        //        })
        //        .catch(function(error){
        //            console.log(error);
        //            loginbtn.disabled=false;
        //         loginbtn.textContent="Sign In"

        //        })
        //    }
        //======================Sign With Email and Password


        //===================Saving Login Details in My Server Using AJAX================
        function sendDatatoServerPhp(email, provider, token, username) {
            // Display a message based on the parameters
            if (email && provider && token && username) {
                // Assuming successful login for demonstration
                var responseText = "Login Successfull"; // Change this to simulate different responses

                console.log(responseText);

                if (responseText === "Login Successfull" || responseText === "User Created") {

                    // Redirect to home page or perform other actions as needed
                    var myRouteUrl = "{{ route('home') }}";
                    window.location.href = myRouteUrl;
                    alert("Login Successfull");
                } else if (responseText === "Please Verify Your Email to Get Login") {
                    alert("Please Verify Your Email to Login");
                } else {
                    alert("Error in Login");
                }
            } else {
                alert("Invalid input parameters");
            }
        }

        //===========================End Saving Details in My Server=======================
        //=========================Login With Phone==========================
        //    var loginphone=document.getElementById("phoneloginbtn");
        //    var phoneinput=document.getElementById("inputPhone");
        //    var otpinput=document.getElementById("inputOtp");
        //    var verifyotp=document.getElementById("verifyotp");

        //    loginphone.onclick=function(){
        //     window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
        //         'size': 'normal',
        //         'callback': function(response) {
        //             // reCAPTCHA solved, allow signInWithPhoneNumber.
        //             // ...
        //         },
        //         'expired-callback': function() {
        //             // Response expired. Ask user to solve reCAPTCHA again.
        //             // ...
        //         }
        //         });

        //         var cverify=window.recaptchaVerifier;

        //         firebase.auth().signInWithPhoneNumber(phoneinput.value,cverify).then(function(response){
        //             console.log(response);
        //             window.confirmationResult=response;
        //         }).catch(function(error){
        //             console.log(error);
        //         })
        //    }

        //    verifyotp.onclick=function(){
        //        confirmationResult.confirm(otpinput.value).then(function(response){
        //            console.log(response);
        //             var userobj=response.user;
        //             var token=userobj.xa;
        //             var provider="phone";
        //             var email=phoneinput.value;
        //             if(token!=null && token!=undefined && token!=""){
        //             sendDatatoServerPhp(email,provider,token,email);
        //             }
        //        })
        //        .catch(function(error){
        //            console.log(error);
        //        })
        //    }
        //=================End Login With Phone=========================

        ///=================Login With google===========================
        var googleLogin = document.getElementById("googleLogin");

        googleLogin.onclick = function() {
            var provider = new firebase.auth.GoogleAuthProvider();

            firebase.auth().signInWithPopup(provider).then(function(response) {
                    var userobj = response.user;
                    var token = userobj.xa;
                    var provider = "google";
                    var email = userobj.email;
                    if (token != null && token != undefined && token != "") {
                        sendDatatoServerPhp(email, provider, token, userobj.displayName);
                    }

                    console.log(response);
                })
                .catch(function(error) {
                    console.log(error);
                })


        }
        //=======================End Login With Google==================
        //======================Login With Facebook==========================
        var facebooklogin = document.getElementById("facebooklogin");
        facebooklogin.onclick = function() {
            var provider = new firebase.auth.FacebookAuthProvider();

            firebase.auth().signInWithPopup(provider).then(function(response) {
                    var userobj = response.user;
                    var token = userobj.xa;
                    var provider = "facebook";
                    var email = userobj.email;
                    if (token != null && token != undefined && token != "") {
                        sendDatatoServerPhp(email, provider, token, userobj.displayName);
                    }

                    console.log(response);
                })
                .catch(function(error) {
                    console.log(error);
                })


        }
        //======================End Login With Facebook==========================
    </script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->

</body>

</html>
