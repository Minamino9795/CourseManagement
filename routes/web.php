<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/layouts', function () {
    return view('admin.layouts.master');
});

Route::resource('categories', CategoryController::class);
Route::resource('courses', CourseController::class);



Route::prefix('users')->group(function () {
    Route::get('/trash', [UserController::class, 'trashedItems'])->name('users.trash');
    Route::delete('/force_destroy/{id}', [UserController::class, 'force_destroy'])->name('users.force_destroy');
    Route::get('/restore/{id}', [UserController::class, 'restore'])->name('users.restore');
});


Route::group(['middleware' => 'auth'], function () {
    Route::resource('users', UserController::class);
    Route::resource('groups', GroupController::class);
});
//Login-Logout
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/postLogin', [AuthController::class, 'postLogin'])->name('postLogin');


Route::get('/forgetPassword', [\App\Http\Controllers\ForgotPasswordController::class, 'forgetPassword'])
    ->name('forgetPassword');
Route::post('/forgetPasswordPost', [\App\Http\Controllers\ForgotPasswordController::class, 'forgetPasswordPost'])
    ->name('forgetPasswordPost');
Route::get('/reset-password/{token}', [\App\Http\Controllers\ForgotPasswordController::class, 'resetPassword'])
    ->name('resetPassword');
Route::post('/resetPasswordPost', [\App\Http\Controllers\ForgotPasswordController::class, 'resetPasswordPost'])
    ->name('resetPasswordPost');


Route::get('/show/{id}', [GroupController::class, 'show'])->name('groups.show');
Route::put('/group_role/{id}', [GroupController::class, 'group_role'])->name('groups.group_role');

Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/order/detail/{id}', [OrderController::class, 'detail'])->name('order.detail');
Route::get('/exportOrder', [OrderController::class, 'exportOrder'])->name('orders.export');
