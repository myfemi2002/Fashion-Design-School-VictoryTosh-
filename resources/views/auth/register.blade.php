<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="Victorytosh Admin Panel" />
        <meta name="keywords" content="Victorytosh Fashion School" />
        <meta name="author" content="Fashion School" />
        <link rel="shortcut icon" href="{{ asset('backend/assets/img/favicon.ico') }}" />
        <title>Victory Admin - Signup</title>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

        <!-- Common CSS -->
        <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('backend/assets/fonts/icomoon/icomoon.css') }}" />

        <!-- Mian and Login css -->
        <link rel="stylesheet" href="{{ asset('backend/assets/css/main.css') }}" />

    </head>

    <body class="login-bg">

        <div class="container">
            <div class="login-screen row align-items-center">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="login-container">
                            <div class="row no-gutters">
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                    <div class="login-box">
                                        <a href="#" class="login-logo">
                                            <img src="{{ asset('backend/assets/img/unify-loading.png') }}" alt="Victorytosh Admin " />
                                        </a>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="fullname"><i class="icon-account_circle"></i></span>
                                            <input type="text" class="form-control" id="name" name="name" required autofocus autocomplete="name" placeholder="Full Name">
                                        </div>
                                        <br>

                                        <div class="input-group">
                                            <span class="input-group-addon" id="email"><i class="icon-account_circle"></i></span>
                                            <input type="email" class="form-control" id="email" name="email" required placeholder="Email ID">
                                        </div>
                                        <br>

                                        <div class="input-group">
                                            <span class="input-group-addon" id="password"><i class="icon-verified_user"></i></span>
                                            <input type="password" class="form-control"  id="password" name="password" required autocomplete="new-password" placeholder="Password">
                                        </div>
                                        <br>

                                        <div class="input-group">
                                            <span class="input-group-addon" id="password"><i class="icon-verified_user"></i></span>
                                            <input type="password" class="form-control"  id="password_confirmation" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                        </div>

                                        <div class="actions clearfix">
                                            <button type="submit" class="btn btn-primary">Signup</button>
                                        </div>

                                        <div class="or"></div>
                                        <div class="mt-4">
                                            <a href="{{ route('login') }}" class="additional-link">Already have an Account? <span>Login Now</span></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-lg-8 col-md-6 col-sm-12">
                                    <div class="signup-slider"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <footer class="main-footer no-bdr fixed-btm">
            <div class="container">
                <p>Copyright : &copy; 2019 - <script>document.write(new Date().getFullYear());</script> All rights reserved
                    <i class="fab fa-hearto" aria-hidden="true"></i> by <a href="http://www.newinfo.com.ng/" target="_blank"><span>Newinfo</span></a>
                </p>
            </div>
        </footer>
    </body>
</html>

