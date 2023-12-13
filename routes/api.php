<?php

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
Route::get('/courses', [App\Http\Controllers\Api\CourseApiController::class, 'index']);
Route::get('/categories', [App\Http\Controllers\Api\CourseApiController::class, 'index']);
Route::get('/chapters', [App\Http\Controllers\Api\CourseApiController::class, 'index']);
Route::get('/lessions', [App\Http\Controllers\Api\CourseApiController::class, 'index']);
Route::get('/levels', [App\Http\Controllers\Api\CourseApiController::class, 'index']);