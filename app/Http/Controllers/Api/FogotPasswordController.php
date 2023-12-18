<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class FogotPasswordController extends Controller
{
    public function sendResetLinkEmail(Request $request)
    {
        $email = $request->input('email');

        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json(['error' => 'Email không tồn tại.'], 404);
        }

        $token = Password::createToken($user);

        // Gửi token và logic xác nhận đặt lại mật khẩu
        // ...

        return response()->json(['message' => 'Đã gửi liên kết đặt lại mật khẩu thành công.'], 200);
    }
}
