<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    
    <link href="{{ asset('theme_css/css/font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('theme_css/vendor/font-awesome-4.7/css/font-awesome.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('theme_css/vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('theme_css/vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('theme_css/vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('theme_css/vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('theme_css/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('theme_css/vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('theme_css/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{ asset('theme_css/ vendor/slick/slick.css" rel="stylesheet')}}" media="all">
    <link href="{{ asset('theme_css/vendor/select2/select2.min.css')}} " rel="stylesheet" media="all">
    <link href="{{ asset('theme_css/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('theme_css/css/theme.css')}} " rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="https://gharbaar.com/assets/site/images/logo-colorful.svg" alt="GHARBAAR.COM" style="width: 300px;">
                            </a>
                        </div>
                        <div class="login-form">
                            @if (Session::has('login_error'))
                                <div class="alert alert-info">{{ Session::get('login_error') }}</div>
                            @endif
                            <form action="{{ route('loginAttempt') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full email" type="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full password" type="password" name="password" placeholder="Password" required>
                                </div>

                                <div class="form-group">
                                    <label>Select Type</label>
                                    <Select class="form-control select_type" id="select" name="login_type" required>
                                        <option value="" selected>Select Type</option>
                                        <option value="admin" >Login as Admin</option>
                                        <option value="user" >Login as User</option>
                                        <option value="blogger" >Login as Blogger</option>
                                    </Select>
                                </div>

                                {{-- <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                    <label>
                                        <a href="#">Forgotten Password?</a>
                                    </label>
                                </div> --}}
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                                
                            </form>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{ asset('theme_css/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset('theme_css/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{ asset('theme_css/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset('theme_css/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{ asset('theme_css/vendor/wow/wow.min.js')}}"></script>
    <script src="{{ asset('theme_css/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{ asset('theme_css/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{ asset('theme_css/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{ asset('theme_css/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{ asset('theme_css/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{ asset('theme_css/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{ asset('theme_css/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{ asset('theme_css/vendor/select2/select2.min.js')}}">
    </script>

    <!-- Main JS-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('theme_css/js/main.js')}}"></script>
    <script src="{{ asset('scripts/script.js')}}"></script>


</body>

</html>
<!-- end document-->