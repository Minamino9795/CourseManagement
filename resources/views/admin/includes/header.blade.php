<header class="app-header app-header-dark">

    <div class="top-bar">
        <div class="top-bar-brand">
            <button class="hamburger hamburger-squeeze mr-2" type="button" data-toggle="aside-menu" aria-label="toggle aside menu">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
        <div class="top-bar-list">
            <div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none">
                <button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="toggle menu">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
            <div class="top-bar-item top-bar-item-full">
            </div>
            <div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">
                <div class="dropdown d-none d-md-flex">
                    <button class="btn-account" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="user-avatar user-avatar-md"><img src="{{ asset($current_user->image) }}" alt=""></span>
                        <span class="account-summary pr-lg-4 d-none d-lg-block">
                            <span class="account-name">{{ auth()->user()->name }}</span>
                            <span class="account-description">Đang hoạt động</span>
                        </span>
                    </button>
                    <div class="dropdown-menu">

                        <div class="dropdown-arrow d-lg-none" x-arrow=""></div>
                        <div class="dropdown-arrow ml-3 d-none d-lg-block"></div>
                        <h6 class="dropdown-header d-none d-md-block d-lg-none">
                            Beni Arisandi
                        </h6>
                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
                        <a class="dropdown-item" href="user-profile.html">

                            <span class="dropdown-icon"><i class="bi bi-person"></i></span>
                            Cá nhân
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}">
                            <span class="dropdown-icon"><i class="fas fa-sign-out-alt"></i></span>
                            Đăng xuất
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>