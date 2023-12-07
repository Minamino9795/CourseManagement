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
            <li class="menu-item has-child">
                <a href="" class="menu-link"><span class="menu-icon"><i class="fas fa-users"></i></span>
                    <span class="menu-text">Danh mục</span></a>
                <ul class="menu">
                    <li class="menu-subhead">Danh mục</li>
                    <li class="menu-item">
                        <a href="{{ route('categories.index') }}" class="menu-link" tabindex="-1">Danh Sách</a>
                    </li>
                </ul>
            </li>

            <li class="menu-item has-child">
                <a href="" class="menu-link">
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

            <li class="menu-item has-child">
                <a href="" class="menu-link">
                    <span class="menu-icon">
                        <i class="fas fa-bookmark"></i>
                    </span>
                    <span class="menu-text">Chương học</span>
                </a>
                <ul class="menu">
                    <li class="menu-item">
                        <a href="{{ route('chapters.index') }}" class="menu-link" tabindex="-1">
                            Danh Sách Các Chương Học
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item has-child">
                <a href="" class="menu-link">
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

            <li class="menu-item has-child">
                <a href="" class="menu-link">
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

            <li class="menu-item has-child">
                <a href="" class="menu-link">
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
        </ul>
    </nav>
</div>
