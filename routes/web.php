<?php

use App\Http\Controllers\CategoryController;
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
use App\Http\Controllers\TenController;

Route::resource('categories', CategoryController::class);
Route::resource('chapters', \App\Http\Controllers\ChapterController::class);