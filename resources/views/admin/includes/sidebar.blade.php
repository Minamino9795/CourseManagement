<div class="aside-menu overflow-hidden">
    <nav id="stacked-menu" class="stacked-menu">
        <ul class="menu">
            <li class="menu-item">
                <a href="/layouts" class="menu-link">
                    <span class="menu-icon fas fa-home"></span>
                    <span class="menu-text">Trang chủ</span>
                </a>
            </li>
            <li class="menu-header">Danh Mục </li>
            @if (Auth::user()->hasPermission('categories_viewAny'))
            <li class="menu-item has-child">
                <a href="{{ route('categories.index') }}" class="menu-link"><span class="menu-icon"><i class="fas fa-users"></i></span>
                    <span class="menu-text">Danh mục</span></a>
                <ul class="menu">
                    <li class="menu-subhead">Danh mục</li>
                    <li class="menu-item">
                        <a href="{{ route('categories.index') }}" class="menu-link" tabindex="-1">Danh Sách</a>
                    </li>
                </ul>
                @endif
            </li>
            @if (Auth::user()->hasPermission('courses_viewAny'))
            <li class="menu-item has-child">
                <a href="{{ route('courses.index') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="fas fa-book"></i>
                    </span>
                    <span class="menu-text">Khóa học</span>
                </a>
                <ul class="menu">
                    <li class="menu-item">
                        <a href="{{ route('courses.index') }}" class="menu-link" tabindex="-1">
                            Danh Sách Khóa Học
                        </a>
                    </li>
                </ul>
            </li>
            @endif
                @if (Auth::user()->hasPermission('lessions_viewAny'))
            <li class="menu-item has-child">
                <a href="{{ route('lessions.index') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="fas fa-chalkboard-teacher"></i>
                    </span>
                    <span class="menu-text">Bài học</span>
                </a>
                <ul class="menu">
                    <li class="menu-item">
                        <a href="{{ route('lessions.index') }}" class="menu-link" tabindex="-1">
                            Danh Sách Các Bài Học
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            @if (Auth::user()->hasPermission('levels_viewAny'))
            <li class="menu-item has-child">
                <a href="{{ route('levels.index') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="fas fa-level-up-alt"></i>
                    </span>
                    <span class="menu-text">Cấp độ</span>
                </a>
                <ul class="menu">
                    <li class="menu-item">
                        <a href="{{ route('levels.index') }}" class="menu-link" tabindex="-1">
                            Danh Sách Các Cấp Độ
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            @if (Auth::user()->hasPermission('groups_viewAny'))
            <li class="menu-item has-child">
                <a href="{{ route('groups.index') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="fas fa-lock"></i>
                    </span>
                    <span class="menu-text">Quyền Quản Trị</span>
                </a>
                <ul class="menu">
                    <li class="menu-item">
                        <a href="{{ route('groups.index') }}" class="menu-link" tabindex="-1">
                            Danh Sách
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            @if (Auth::user()->hasPermission('users_viewAny'))
            <li class="menu-item has-child">
                <a href="{{ route('users.index') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="fas fa-user"></i>
                    </span>
                    <span class="menu-text">Thành viên</span>
                </a>
                <ul class="menu">
                    <li class="menu-item">
                        <a href="{{ route('users.index') }}" class="menu-link" tabindex="-1">
                            Danh Sách
                        </a>
                    </li>
                </ul>
            </li>
            @endif
            @if (Auth::user()->hasPermission('orders_viewAny'))
            <li class="menu-item has-child">
                <a href="{{ route('orders.index') }}" class="menu-link">
                    <span class="menu-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </span>
                    <span class="menu-text">Đơn Hàng</span>
                </a>
                <ul class="menu">
                    <li class="menu-item">
                        <a href="{{ route('orders.index') }}" class="menu-link" tabindex="-1">
                            Danh Sách Đơn Hàng
                        </a>
                    </li>
                </ul>
            </li>
            @endif
        </ul>
    </nav>
</div>
