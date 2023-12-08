@extends('admin.layouts.login')
@section('content')
<main class="auth">
    <header id="auth-header" class="auth-header" style="background-image: url(assets/images/illustration/img-1.png);">
        <h1>
            QUẢN LÝ THIẾT BỊ
            <span class="sr-only">Sign In</span>
        </h1>

    </header><!-- form -->

    <form method="POST" action="{{route('forgetPasswordPost')}}" class="auth-form auth-form-reflow">
        @csrf
        <input type="hidden" name="_token" value="4EzBJVDeZmyBN8Q7vM46OdDslzj9lejQqC6aseHE">
        <div class="text-center mb-4">
            <div class="mb-4">
                <img class="rounded" src="assets/apple-touch-icon.png" alt="" height="72">
            </div>
            <h1 class="h3"> Đặt Lại Mật Khẩu </h1>
        </div>
        <p class="mb-4">
        </p><!-- .form-group -->
        <div class="form-group mb-4">
            <label class="d-block text-left" for="inputUser">Email</label>
            <input id="email" type="email" name="email" value="" required="" autofocus="" class="form-control form-control-lg">
            @error('email')
                <span>{{ $message }}</span>
            @enderror
            <p class="text-muted">
                <small>Chúng tôi sẽ gửi liên kết đặt lại mật khẩu đến email của bạn.</small>
            </p>
            @if (session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
        </div><!-- /.form-group -->
        <!-- actions -->
        <div class="d-block d-md-inline-block mb-2">
            <button class="btn btn-lg btn-block btn-primary" type="submit">Đặt Lại Mật Khẩu</button>
        </div>
        <div class="d-block d-md-inline-block">
            <a href="https://thptatuc-backend.quanlythietbitruonghoc.com/login" class="btn btn-block btn-light">Quay Về Đăng Nhập</a>
        </div>
    </form>
    <!-- /.auth-form -->
    <!-- copyright -->
    <footer class="auth-footer"> © 2023 School.
    </footer>
</main>
@endsection