<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="Unify Admin Panel" />
        <meta name="keywords" content="Victorytosh Login" />
        <meta name="author" content="Victorytosh Login" />
        <link rel="shortcut icon" href="{{ asset('backend/assets/img/favicon.ico') }}" />
        <title>Victorytosh - Login</title>

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

                    @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="login-container">
                            <div class="row no-gutters">
                                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                                    <div class="login-box">
                                        <a href="#" class="login-logo">
                                            <img src="{{ asset('backend/assets/img/unify-loading.png') }}" alt="Victorytosh Admin Dashboard" />
                                        </a>
                                        <div class="input-group">
                                            <span class="input-group-addon" id="username"><i class="icon-account_circle"></i></span>
                                            <input type="email" class="form-control"  id="email"  name="email" required autofocus placeholder="Username" aria-label="username" aria-describedby="username">
                                        </div>
                                        <br>

                                        <div class="input-group">
                                            <span class="input-group-addon" id="password"><i class="icon-verified_user"></i></span>
                                            <input type="password" class="form-control"  id="password" name="password" required autocomplete="current-password" placeholder="Password" aria-label="Password" aria-describedby="password">
                                        </div>

                                        <div class="actions clearfix">
                                            <a href="#">Lost password?</a>
                                            <button type="submit" class="btn btn-primary">Login</button>
                                        </div>

                                        <div class="or"></div>
                                        <div class="mt-4">
                                            <a href="#" class="additional-link">Don't have an Account? <span>Create Now</span></a>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
                                    <div class="login-slider"></div>
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
