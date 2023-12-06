<div style="width:600px; margin: 0 auto">
    <div style="text-align:center">
        <h2>Xin chào {{$user->name}}</h2>
        <p>Email này để giúp bạn lấy lại mật khẩu tài khoản đã bị quên</p>
        <p>Vui lòng click vào link dưới đây để lấy lại mật khẩu</p>
        <p>
            <a href="{{ route('resetPassword', ['user' => $user->email, 'token' => $user->token]) }}" style="display: inline-block;background:green;color:#fff;padding:7px 25px;font-weight:bold">
                Đặt lại mật khẩu
            </a>
        </p>
    </div>
</div>