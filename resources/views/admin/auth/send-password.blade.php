
<main class="auth">
    <form method="POST" action="{{route('resetPasswordPost')}}" class="auth-form auth-form-reflow">
        @csrf
        <input type="hidden" name="token" value="{{$token}}">
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
        </div>
        <div class="form-group mb-4">
            <label class="d-block text-left" for="inputUser">Password</label>
            <input id="password" type="password" name="password" value="" required="" autofocus="" class="form-control form-control-lg">
        </div>
        <div class="form-group mb-4">
            <label class="d-block text-left" for="inputUser">Password Confirm</label>
            <input id="password_confirmation" type="password_confirmation" name="password_confirmation" value="" required="" autofocus="" class="form-control form-control-lg">
        </div>
        <!-- /.form-group -->
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