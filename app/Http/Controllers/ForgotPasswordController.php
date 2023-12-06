<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   function forgetPassword(){
    return view('admin.auth.forgot-password');
   }

   function forgetPasswordPost(Request $request)
{
    $request->validate([
        'email' => "required|email|exists:users",
    ]);
    $token = Str::random(64);

    DB::table('password_reset_tokens')->updateOrInsert(
        ['email' => $request->email],
        ['token' => $token, 'created_at' => Carbon::now()]
    );

    Mail::send("admin.auth.send-password", ['token' => $token], function ($message) use ($request) {
        $message->to($request->email);
        $message->subject("Reset Password");
    });

    return redirect()->to(route('forgetPassword'))->with("success", "Chúng tôi đã gửi liên kết đặt lại mật khẩu đến email của bạn");
}

   function resetPassword($token){
    return view('admin.auth.send-password',compact('token'));
   }

   function resetPasswordPost(Request $request){
            $request->validate([
                "email" => "required|email|exists:users",
                "password" => "required|sting|min:6|confirmed",
                "password_confirmation" => "required"
            ]);
            $updatePassword = DB::table('password_reset_tokens')
            ->where([
                "email" => $request->email,
                "token" => $request->token
            ])->first();
            if(!$updatePassword){
                return redirect()->to(route('resetPassword'))->with('error',"invalid");
            }
            User::where("email",$request->email)
            ->update(["password"=>Hash::make($request->password)]);

   }
}
