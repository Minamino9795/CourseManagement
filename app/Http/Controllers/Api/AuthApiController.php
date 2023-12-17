<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //dử liệu đầu vào có lổi -> trả về JSON và 422
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //xác thực người dùng nếu sai -> trả về 401 Unauthorized
        if (!$token = auth('api')->attempt($validator->validated())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        //thành công -> trả về một phản hồi chứa JSON
        return  response()->json([
            'status' => true,
            'message' => 'Đăng nhập thành công',
            'user' => auth('api')->user(), //THÔNG TIN VỀ USER ĐĂNG NHẬP
            'access_token' => $token, //tạo token
            'token_type' => 'bearer', //loại token
            'expires_in' => Config::get('jwt.ttl'), //thời gian tồn tại của token
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'phone' => 'required|unique:users',
            'address' => 'required|max:255',
            'password' => 'required|min:6',
            'gender' => 'required',
            'birthday' => 'required',

        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'image' => 'storage/user/26ảnh đại diện.jpg',
            'group_id' => 4,
            'status' => 1,

            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'User created successfully',
            'user' => $user
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'message' => 'Successfully logged out',
        ]); 
    }

    public function refresh()
    {
        return response()->json([
            'user' => Auth::user(),
            'authorisation' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }
    
}
