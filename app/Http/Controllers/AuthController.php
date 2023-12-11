<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\JsonResponse;


class AuthController extends Controller
{

    public function login()
    {
        return view('admin.auth.login');
    }
    public function logout(Request $request)
    {
       
    $user = $request->user();

    // Xóa tất cả các token khác của người dùng
    $user->tokens()->delete();

    // Đặt remember_token thành null
    $user->update(['remember_token' =>  NULL]);

    // Đăng xuất phiên làm việc
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return $request->wantsJson()
        ? new JsonResponse([], 204)
        : redirect()->route('login');
    }

    public function postLogin(LoginRequest $request)
{
    $credentials = [
        'email' => $request->email,
        'password' => $request->password,
    ];

    if (Auth::attempt($credentials, $request->filled('remember'))) {
        return redirect()->route('lessions.index')->with('success',__('sys.login_item_success'));
    } else {
        return redirect()->route('login')->with('error', __('sys.login_item_success'));
    }
}
}