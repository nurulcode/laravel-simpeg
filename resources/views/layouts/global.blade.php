<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="{{ asset('assets\images\favicon.ico') }}" />

    <link rel="shortcut icon" href="assets\images\favicon.ico">
    <!-- Plugins css -->

    <link href="{{ asset('plugins\datatables\dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('plugins\datatables\buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Responsive datatable examples -->
    <link href="{{ asset('plugins\datatables\responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('plugins\bootstrap-colorpicker\css\bootstrap-colorpicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins\bootstrap-datepicker\dist\css\bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugins\select2\css\select2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('plugins\bootstrap-touchspin\css\jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet">
    <!--Chartist Chart CSS -->
    <link href="{{ asset('assets\css\bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets\css\metismenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets\css\icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets\css\style.css') }}" rel="stylesheet" type="text/css" />
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css" integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />

    <style>
        #loader {
            position: fixed;
            width: 100%;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            background-color: rgba(255, 255, 255, 0.568);
            z-index: 9999;
            display: none;
        }

        @-webkit-keyframes spin {
            from {
                -webkit-transform: rotate(0deg);
            }

            to {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        #loader::after {
            content: '';
            display: block;
            position: absolute;
            top: 50%;
            left: 47%;
            transform: translate(-50%, -50%);
            width: 75px;
            height: 75px;
            border-style: solid;
            border-color: #3539584f;
            border-top-color: transparent;
            border-width: 4px;
            border-radius: 50%;
            -webkit-animation: spin .8s linear infinite;
            animation: spin .8s linear infinite;
        }

        .btn-outline {
            color: #353958;
            background-color: #f1f1f1;
            border-color: #b8bce0;
            border-radius: 0;
        }

        .btn-outline:hover,
        .btn-outline:active,
        .btn-outline:focus,
        .btn-outline.active {
            background: #a9afe4;
            color: #ffffff;
            border-color: #a9afe4;
        }

        /* for demo purpose only */
        body {
            padding: 20px 0;
        }

        h1 {
            font-weight: 300;
            margin-bottom: 40px;
        }

        .content-page .content {
            padding: 0 15px 10px 15px;
            margin-top: 40px;
            margin-bottom: 60px
        }

        .page-title-box {
            padding: 15px 0
        }

        .card-header {
            padding: .5rem 0;
        }

        .card-body {
            padding: 1rem 1.25;
        }

        .btn {
            font-size: 14;
            border-radius: 0;
        }

        .badge {
            border-radius: 0;
        }

        #sidebar-menu>ul>li>a:active,
        #sidebar-menu>ul>li>a:focus,
        #sidebar-menu>ul>li>a:hover {
            color: #ffffff !important;
            background-color: #626ed4 text-decoration: none
        }

        #display-div {
            display: none;
        }

        .scroll-to-top {
            position: fixed;
            right: 1rem;
            bottom: 1rem;
            display: none;
            width: 2rem;
            height: 2rem;
            text-align: center;
            color: #fff;
            background: rgba(90, 92, 105, 0.5);
            line-height: 46px;
            transition: all 0.3s ease-in-out;
            -webkit-transition: all 0.3s ease-in-out;
        }

        .scroll-to-top:focus,
        .scroll-to-top:hover {
            color: white;
            transition: all 0.3s ease-in-out;
            -webkit-transition: all 0.3s ease-in-out;
        }

        .scroll-to-top:hover {
            background: #5a5c69;
            transition: all 0.3s ease-in-out;
            -webkit-transition: all 0.3s ease-in-out;
        }

        .scroll-to-top i {
            font-weight: 800;
        }

        .rounded {
            border-radius: 0.35rem !important;
        }

    </style>
</head>

<body>
    <div>
        <!-- Begin page -->
        <div id="wrapper">
            <!-- Top Bar Start -->
            <div class="topbar">
                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.html" class="logo">
                        <span>
                            <h5 class="text-secondary" height="18">SIMPEG v1.0</h5>
                        </span>
                        <i>
                            <img src="{{ asset('assets\images\logo-sm.png') }}" alt="" height="22" />
                        </i>
                    </a>
                </div>

                <nav class="navbar-custom">
                    <ul class="navbar-right list-inline float-right mb-0">
                        <li class="dropdown notification-list list-inline-item">
                            <div class="dropdown notification-list nav-pro-img">
                                <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="{{ asset('assets\images\users\user-4.jpg') }}" alt="user" class="rounded-circle" />
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown">
                                    <!-- item-->
                                    <a class="dropdown-item" href="#">
                                        <i class="mdi mdi-account-circle m-r-5"></i>
                                        Profile
                                    </a>

                                    <a class="dropdown-item d-block" href="#"> <i class="mdi mdi-settings m-r-5"></i>
                                        Settings</a>

                                    <div class="dropdown-divider"></div>

                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button class="dropdown-item text-danger">
                                            <i class="mdi mdi-power text-danger"></i>
                                            Logout
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-effect">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->
            @include('layouts.menus');
            <!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">
                        {{-- <div class="page-title-box">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <h4 class="page-title">@yield('page-title')</h4>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Veltrix</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Forms</a></li>
                                    <li class="breadcrumb-item active">Form Validation</li>
                                </ol>
                            </div>
                        </div>
                    </div> --}}
                        <!-- end row -->
                        {{-- @yield('content') --}}
                    </div>
                    {{-- <div id="simpeg">
                    </div> --}}
                    @yield('content')

                </div>
                <!-- container-fluid -->
            </div>
            <!-- content -->
            <footer class="footer block">
                © 2019 Veltrix <span class="d-none d-sm-inline-block">
                    <i class="mdi mdi-heart text-danger"></i> Themesbrand
                </span>.
            </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->
    <!-- jQuery  -->
    <script src="{{ asset('assets\js\jquery.min.js') }}"></script>
    <script src="{{ asset('assets\js\bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets\js\metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets\js\jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets\js\waves.min.js') }}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('plugins\bootstrap-colorpicker\js\bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('plugins\bootstrap-datepicker\js\bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('plugins\select2\js\select2.min.js') }}"></script>
    <script src="{{ asset('plugins\bootstrap-maxlength\bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ asset('plugins\bootstrap-filestyle\js\bootstrap-filestyle.min.js') }}"></script>
    <script src="{{ asset('plugins\bootstrap-touchspin\js\jquery.bootstrap-touchspin.min.js') }}"></script>
    <!-- Plugins Init js -->
    <script src="{{ asset('assets\pages\form-advanced.js') }}"></script>
    <!-- Required datatable js -->
    <script src="{{ asset('plugins\datatables\jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins\datatables\dataTables.bootstrap4.min.js') }}"></script>

    <!-- Buttons examples -->
    <script src="{{ asset('plugins\datatables\dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins\datatables\buttons.bootstrap4.min.js') }}"></script>
    {{-- <script src="{{ asset('plugins\datatables\jszip.min.js') }}"></script>
    <script src="{{ asset('plugins\datatables\pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins\datatables\vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins\datatables\buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins\datatables\buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins\datatables\buttons.colVis.min.js') }}"></script> --}}
    <!-- Responsive examples -->

    <script src="{{ asset('plugins\datatables\dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins\datatables\responsive.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('plugins\parsleyjs\parsley.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ asset('assets\pages\datatables.init.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.js" integrity="sha256-siqh9650JHbYFKyZeTEAhq+3jvkFCG8Iz+MHdr9eKrw=" crossorigin="anonymous"></script>



    @yield('javascript')
    <!--App-->
    <script src="{{ asset('assets\js\app.js') }}"></script>

    </div>
</body>

</html>
