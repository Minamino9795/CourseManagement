<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="shortcut icon" href="{{ asset('assets/favicon.ico') }}">
    <meta name="theme-color" content="#3063A0">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/stylesheets/theme.min.css') }}" data-skin="default">
    <link rel="stylesheet" href="{{ asset('assets/stylesheets/custom.css') }}">
    @yield('header')
</head>

<body class=" default-skin pace-done">
    <div class="app">
        @include('admin.includes.header');
        <aside class="app-aside app-aside-expand-md app-aside-light">
            <div class="aside-content">
                <header class="aside-header d-block d-md-none">
                    <button class="btn-account" type="button" data-toggle="collapse"
                        data-target="#dropdown-aside"><span class="user-avatar user-avatar-lg"><img
                                src="assets/images/avatars/profile.jpg" alt=""></span> <span
                            class="account-icon"><span class="fa fa-caret-down fa-lg"></span></span> <span
                            class="account-summary"><span class="account-name">Beni Arisandi</span> <span
                                class="account-description">Marketing Manager</span></span></button>
                    <div id="dropdown-aside" class="dropdown-aside collapse">
                        <div class="pb-3">
                            <a class="dropdown-item" href="user-profile.html"><span
                                    class="dropdown-icon oi oi-person"></span> Profile</a> <a class="dropdown-item"
                                href="auth-signin-v1.html"><span class="dropdown-icon oi oi-account-logout"></span>
                                Logout</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Help Center</a>
                            <a class="dropdown-item" href="#">Ask Forum</a> <a class="dropdown-item"
                                href="#">Keyboard Shortcuts</a>
                        </div>
                    </div>
                </header>
                @include('admin.includes.sidebar')
                <footer class="aside-footer border-top p-2">
                </footer>
            </div>
        </aside>
        <main class="app-main">
            <div class="wrapper">
                <div class="page">
                    @yield('content')
                    <div class="page-inner">
                        <header class="page-title-bar">
                            <h1 class="page-title"></h1>
                        </header>
                        <div class="page-section">
                            <div class="section-block">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/popper.js/umd/popper.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/pace-progress/pace.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/stacked-menu/js/stacked-menu.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="assets/javascript/theme.min.js"></script>
    @yield('footer')
</body>

</html>
