<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function forgetPassword()
    {
        return view('admin.auth.forgot_password');
    }

    public function forgetPasswordPost(ForgotPasswordRequest $request)
    {
        $newToken = strtoupper(Str::random(10));
        $user = User::where('email', $request->email)->first();
        // Create or Update token
        $user->token = $newToken;
        $user->save();

        Mail::send('admin.auth.send_email', compact('user'), function ($email) use ($user) {
            $email->subject('Lấy lại mật khẩu');
            $email->to($user->email, $user->name);
        });

        return redirect()->back()->with('success', 'Vui lòng kiểm tra email để lấy lại mật khẩu');
    }

    function resetPassword(Request $request)
    {   
        $token = $request->token;
        $user = User::where('token',$token)->first();
        if ($user) {
            return view('admin.auth.getPass', compact('user'));
        } else {
            // Xử lý khi không tìm thấy người dùng hoặc token không khớp
            return redirect()->back()->with('error', 'Token không hợp lệ');
        }
    }

    public function resetPasswordPost(Request $request)
{
    $token = $request->token;
    $user = User::where('token', $token)->first();

    if ($user) {
        $user->password = Hash::make($request->password);
        $user->save();
        

        return view('admin.auth.login')->with('success', 'Mật khẩu đã được cập nhật thành công');
    } else {
        return redirect()->back()->with('error', 'Token không hợp lệ');
    }
}
}
