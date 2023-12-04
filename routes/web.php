<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LessionController;
use App\Http\Controllers\CourseController;
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

Route::get('/', function () {
    
    return view('welcome');
}); 
Route::resource('courses',\App\Http\Controllers\CourseController::class );
Route::get('/layouts', function () {
    return view('admin.layouts.master');
});

Route::resource('levels',\App\Http\Controllers\LevelController::class);
use App\Http\Controllers\TenController;

Route::resource('categories', CategoryController::class);
Route::resource('chapters', \App\Http\Controllers\ChapterController::class);

Route::resource('lessions', LessionController::class);

Route::resource('categories', CategoryController::class);
Route::resource('courses', CourseController::class);