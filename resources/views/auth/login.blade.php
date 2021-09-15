<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
    <title>Veltrix - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta content="Admin Dashboard" name="description">
    <meta content="Themesbrand" name="author">
    <link rel="shortcut icon" href="{{ asset('assets\images\favicon.ico') }}">
    <link href="{{ asset('assets\css\bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets\css\metismenu.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets\css\icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets\css\style.css') }}" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="home-btn d-none d-sm-block"><a href="#" class="text-white"><i class="fas fa-home h2"></i></a></div><!-- Begin page -->
    <div class="accountbg"></div>
    <div class="wrapper-page account-page-full">
        <div class="card">
            <div class="card-body">
                <div class="text-center"><a href="#" class="logo"><img src="assets\images\logo-dark.png" height="22" alt="logo"></a></div>
                <div class="p-3">
                    {{-- <h4 class="font-18 m-b-5 text-center">Welcome Back !</h4>
                    <p class="text-muted text-center">Sign in to continue to Veltrix.</p> --}}
                    <form class="form-horizontal m-t-30" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input id="username" placeholder="Input Username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" placeholder="Input Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror </div>
                        <div class="form-group row m-t-20">
                            <div class="col-sm-12 text-right">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="m-t-40 text-center">
            {{-- <p>SIMRS BLU RSU MANOKWARI</p> --}}
            {{-- <p>© 2020 Veltrix. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p> --}}
        </div>
    </div><!-- end wrapper-page -->
    <!-- jQuery  -->
    <script src="{{ asset('assets\js\jquery.min.js') }}"></script>
    <script src="{{ asset('assets\js\bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets\js\metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets\js\jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets\js\waves.min.js') }}"></script><!-- App js -->
    <script src="{{ asset('assets\js\app.js') }}"></script>
</body>

</html>
