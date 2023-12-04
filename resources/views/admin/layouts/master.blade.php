<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!-- End Required meta tags -->
    <!-- Begin SEO tag -->
    <title> Starter Template | Looper - Bootstrap 4 Admin Theme </title>
    <!-- FAVICONS -->
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="shortcut icon" href="{{ asset('assets/favicon.ico') }}">
    <meta name="theme-color" content="#3063A0"><!-- End FAVICONS -->
    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet"><!-- End GOOGLE FONT -->
    <!-- BEGIN PLUGINS STYLES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- END PLUGINS STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link rel="stylesheet" href="{{ asset('assets/stylesheets/theme.min.css') }}" data-skin="default">
    {{-- <link rel="stylesheet" href="{{ asset('assets/stylesheets/theme-dark.min.css') }}" data-skin="dark"> --}}
    <link rel="stylesheet" href="{{ asset('assets/stylesheets/custom.css') }}">
	@yield('header')
</head>

<body class=" default-skin pace-done">
    <!-- .app -->
    <div class="app">
        <!--[if lt IE 10]>
      <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
      <![endif]-->
        <!-- .app-header -->
        @include('admin.includes.header');
        <!-- /.app-header -->
        <!-- .app-aside -->
        <aside class="app-aside app-aside-expand-md app-aside-light">
            <!-- .aside-content -->
            <div class="aside-content">
                <!-- .aside-header -->
                <header class="aside-header d-block d-md-none">
                    <!-- .btn-account -->
                    <button class="btn-account" type="button" data-toggle="collapse"
                        data-target="#dropdown-aside"><span class="user-avatar user-avatar-lg"><img
                                src="assets/images/avatars/profile.jpg" alt=""></span> <span
                            class="account-icon"><span class="fa fa-caret-down fa-lg"></span></span> <span
                            class="account-summary"><span class="account-name">Beni Arisandi</span> <span
                                class="account-description">Marketing Manager</span></span></button>
                    <!-- /.btn-account -->
                    <!-- .dropdown-aside -->
                    <div id="dropdown-aside" class="dropdown-aside collapse">
                        <!-- dropdown-items -->
                        <div class="pb-3">
                            <a class="dropdown-item" href="user-profile.html"><span
                                    class="dropdown-icon oi oi-person"></span> Profile</a> <a class="dropdown-item"
                                href="auth-signin-v1.html"><span class="dropdown-icon oi oi-account-logout"></span>
                                Logout</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Help Center</a>
                            <a class="dropdown-item" href="#">Ask Forum</a> <a class="dropdown-item"
                                href="#">Keyboard Shortcuts</a>
                        </div><!-- /dropdown-items -->
                    </div><!-- /.dropdown-aside -->
                </header><!-- /.aside-header -->
                <!-- .sidebar-->
                @include('admin.includes.sidebar')
                <!-- /.sidebar-menu -->
                <!-- Skin changer -->
                <footer class="aside-footer border-top p-2">
                    
                </footer><!-- /Skin changer -->
            </div><!-- /.aside-content -->
        </aside><!-- /.app-aside -->
        <!-- .app-main -->
        <main class="app-main">
            <!-- .wrapper -->
            <div class="wrapper">
                <!-- .page -->
                <div class="page">
                    <!-- .page-inner -->

                    @yield('content')

                    <div class="page-inner">
                        <!-- .page-title-bar -->
                        <header class="page-title-bar">
                            <!-- page title stuff goes here -->
                            <h1 class="page-title"></h1>
                        </header><!-- /.page-title-bar -->
                        <!-- .page-section -->
                        <div class="page-section">
                            <!-- .section-block -->
                            <div class="section-block">
                                <!-- page content goes here -->
                            </div><!-- /.section-block -->
                        </div><!-- /.page-section -->
                    </div><!-- /.page-inner -->
                </div><!-- /.page -->
            </div><!-- /.wrapper -->
        </main><!-- /.app-main -->
    </div><!-- /.app -->
    <!-- BEGIN BASE JS -->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script> <!-- END BASE JS -->
    <!-- BEGIN PLUGINS JS -->
    <script src="{{ asset('assets/vendor/pace-progress/pace.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/stacked-menu/js/stacked-menu.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script> <!-- END PLUGINS JS -->
    <!-- BEGIN THEME JS -->
    <script src="assets/javascript/theme.min.js"></script> <!-- END THEME JS -->
	@yield('footer')
</body>


</html>
