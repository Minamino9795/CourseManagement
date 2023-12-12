<?php

use App\Http\Controllers\Api\AuthApiController;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::post('login', [AuthApiController::class, 'login']);


Route::post('register', [AuthApiController::class, 'register']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
