@extends('admin.layouts.login')
@section('content')
    <main class="auth">
        <header id="auth-header" class="auth-header" style="background-image: url(assets/images/illustration/img-1.png);">
            <h1>
                QUẢN LÝ KHÓA HỌC
                <span class="sr-only">Sign In</span>
            </h1>

        </header><!-- form -->

        <form method="POST" action="{{ route('resetPasswordPost', ['user' => $user->email, 'token' => $user->token]) }}"
            class="auth-form auth-form-reflow">
            @csrf
            <div class="text-center mb-4">
                <div class="mb-4">
                    <img class="rounded" src="assets/apple-touch-icon.png" alt="" height="72">
                </div>
                <h1 class="h3"> Đặt Lại Mật Khẩu </h1>
            </div>
            <p class="mb-4">
            </p><!-- .form-group -->
            <div class="form-group mb-4">
                <label class="d-block text-left" for="inputUser">Mật khẩu mới</label>
                <input id="password" type="password" name="password" value="" required="" autofocus=""
                    class="form-control form-control-lg">
            </div><!-- /.form-group -->

            @error('password')
                <div style="color: red">{{ $message }}</div>
            @enderror
            <div class="form-group mb-4">
                <label class="d-block text-left" for="inputUser">Xác nhận mật khẩu mới</label>
                <input id="password_confirmation" type="password" name="password_confirmation" value="" required=""
                    autofocus="" class="form-control form-control-lg">
            </div>

            @error('password_confirmation')
                <div style="color: red">{{ $message }}</div>
            @enderror
            <!-- /.form-group -->
            <!-- actions -->
            <div class="d-block d-md-inline-block mb-2">
                <button class="btn btn-lg btn-block btn-primary" type="submit">Đặt Lại Mật Khẩu</button>
            </div>
            <div class="d-block d-md-inline-block">
                <a href="{{ route('login') }}" class="btn btn-block btn-light">Quay Về Đăng Nhập</a>
            </div>
        </form>
        <!-- /.auth-form -->
        <!-- copyright -->
        <footer class="auth-footer"> © 2023 School.
        </footer>
    </main>
@endsection
