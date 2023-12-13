<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }
    public function login(Request $request)
    {
        //Kiểm tra dử liệu đầu vào
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
        $request->validate(
            [
                'name'  => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',    
            ]
            );
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
    
            return response()->json([
                'message' => 'User created successfully',
                'user' => $user
            ]);
    }
  
 
}
