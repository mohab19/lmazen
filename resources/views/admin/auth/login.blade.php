<!doctype html>
<html lang="en">


<!-- Mirrored from jituchauhan.com/influence/landingpage/influence/pages/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Nov 2019 14:19:58 GMT -->
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{URL('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL('assets/vendor/fonts/circular-std/style.css')}}">
    <link rel="stylesheet" href="{{URL('assets/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{URL('assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="../index.html">
                <img class="logo-img" src="{{asset('images/logo-black.png')}}" width="200" height="100" alt="logo">
            </a>
            <span class="splash-description">Please enter your user information.</span>
            <a href="{{route('admin-login')}}">Login as a Admin</a>
        </div>
            <div class="card-body">
                @if ($errors->has('verified'))
                <div class="alert alert-danger">
                    <span>{{ $errors->first('verified') }}</span>
                </div>
                @endif
                <form action="{{ route('login') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="email" type="email" placeholder="Email" autocomplete="off">
                        @if ($errors->has('email'))
                            <span class="help-block" style="color: red;">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="password" type="password" placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="help-block" style="color: red;">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="remember">
                            <span class="custom-control-label">Remember Me</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="{{route('register')}}" class="footer-link">Create An Account</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="{{URL('assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
    <script src="{{URL('assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
</body>


<!-- Mirrored from jituchauhan.com/influence/landingpage/influence/pages/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 04 Nov 2019 14:19:58 GMT -->
</html>
