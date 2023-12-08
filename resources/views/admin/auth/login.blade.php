@extends('admin.layouts.login')
@section('content')
@include('admin.includes.global.alert')
<main class="auth">
    <header id="auth-header" class="auth-header" style="background-image: url(assets/images/illustration/img-1.png);">
        <h1>
            QUẢN LÝ KHÓA HỌC
            <span class="sr-only">Sign In</span>
        </h1>

    </header><!-- form -->

    <form class="auth-form" method="post" action="{{ route('postLogin') }}">
        @csrf
        <div class="form-group">
            <div class="form-label-group">
                <input type="text" id="inputUser" name="email" class="form-control" value="{{old('email')}}" placeholder="Username" autofocus="">
                <label for="inputUser">Email</label>
            </div>
        </div><!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group">
            <div class="form-label-group">
                <input type="password" id="inputPassword" name="password" value="{{old('password')}}" class="form-control" placeholder="Password">
                <label for="inputPassword">Mật Khẩu</label>
            </div>
        </div><!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Đăng Nhập</button>
        </div><!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group text-center">
            <div class="custom-control custom-control-inline custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="remember" name="remember"> <label class="custom-control-label" for="remember">Ghi nhớ mật khẩu</label>
            </div>
        </div><!-- /.form-group -->
        <!-- recovery links -->
        <div class="text-center pt-3">
            <a href="{{ route('forgetPassword') }}" class="link">Quên mật khẩu</a>
        </div><!-- /recovery links -->
    </form>
    <!-- /.auth-form -->
    <!-- copyright -->
    <footer class="auth-footer"> © 2023 School.
    </footer>
</main>

@endsection