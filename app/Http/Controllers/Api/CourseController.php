<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $items = Course::all();
     return response()->json($items);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    // public function register(Request $request, $id)
    // {
    //     $course = Course::findOrFail($id);
    //     $user = User::findOrFail($request->user_id);

    //     if ($user->courses()->where('course_id', $id)->exists()) {
    //         return response()->json(['message' => 'Bạn đã đăng ký khóa học này trước đó']);
    //     }

    //     $user->courses()->attach($id);

    //     return response()->json(['message' => 'Đăng ký và thanh toán khóa học thành công']);
    // }
}
