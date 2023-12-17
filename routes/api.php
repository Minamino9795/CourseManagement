<?php

use App\Http\Controllers\Api\ChapterController;
use App\Http\Controllers\Api\LessionController;
use App\Http\Controllers\Api\LevelController;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\FogotPasswordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('lessions', LessionController::class);
Route::apiResource('chapters', ChapterController::class);
Route::apiResource('levels', LevelController::class);
Route::post('login', [AuthApiController::class, 'login']);
Route::post('register', [AuthApiController::class, 'register']);
Route::post('forgot_password', [FogotPasswordController::class, 'sendResetLinkEmail']);
