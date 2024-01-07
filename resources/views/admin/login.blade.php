<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin/logo/logo1.png') }}">
    <title>Login</title>
    <!-- Custom CSS -->
    <link href="{{ asset('admin/dist/css/style.min.css') }}" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="background">
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative">
            <div class="auth-box row justify-content-center">

                <div class="col-lg-5 col-md-7 bg-white">
                    <div class="p-3">
                        <div class="text-center">
                            <img class="img-fluid" src="{{ asset('admin/logo/logo-bps-prob-2.jpg') }}" alt="wrapkit">
                        </div>
                        <h3 class="mt-3 text-center">Sign In</h3>

                        <form action="/login" method="POST" class="mt-4">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="uname">Email</label>
                                        <input name="email" class="form-control" id="uname" type="text" placeholder="enter your email" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="pwd">Password</label>
                                        <input name="password" class="form-control" id="pwd" type="password" placeholder="enter your password" required>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-block btn-dark">Sign In</button>
                                </div>

                                <div class="col-lg-12 text-center mt-5">

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="{{ asset('admin/assets/libs/jquery/dist/jquery.min.js') }} "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('admin/assets/libs/popper.js/dist/umd/popper.min.js ') }}"></script>
    <script src="{{ asset('admin/assets/libs/bootstrap/dist/js/bootstrap.min.js ') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();

    </script>
    @if(Session::get('errorpw'))
    <script>
        Swal.fire({
            icon: 'error'
            , title: 'Oops...'
            , text: 'Password Salah'
        , });

    </script>
    @endif
    @if(Session::get('erroremail'))
    <script>
        Swal.fire({
            icon: 'error'
            , title: 'Oops...'
            , text: 'Email Tidak Terdaftar'
        , });

    </script>
    @endif
    @if(Session::get('belumlogin'))
    <script>
        Swal.fire({
            icon: 'error'
            , title: 'Oops...'
            , text: 'Anda Belum Login'
        , });

    </script>
    @endif
    @if(Session::get('logout'))
    <script>
        Swal.fire({
            icon: 'success'
            , title: 'Good'
            , text: 'Logout Berhasil'
        , });

    </script>
    @endif
</body>

</html>
