<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class CourseApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Course::all();
        return response()->json($items);
    }

    public function create()
    {
        return response()->json(['message' => 'Phương thức không được hỗ trợ'], 405);
    }
    public function store(Request $request)
    {
        try {
            $course = new Course();
            $course->name = $request->input('name');
            $course->description = $request->input('description');
            // Thêm các trường dữ liệu khác của khóa học vào đây

            $course->save();

            return response()->json(['message' => 'Thêm thành công'], 201);
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Thêm thất bại'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $course = Course::findOrFail($id);
            return response()->json($course, 200);
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Không tìm thấy khóa học'], 404);
        }
    }

    public function edit(string $id)
    {
        return response()->json(['message' => 'Phương thức không được hỗ trợ'], 405);
    }
    public function update(Request $request, string $id)
    {
        try {
            $course = Course::findOrFail($id);
            $course->name = $request->input('name');
            $course->description = $request->input('description');
            // Cập nhật các trường dữ liệu khác của khóa học vào đây

            $course->save();

            return response()->json(['message' => 'Cập nhật thành công'], 200);
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Không tìm thấy khóa học'], 404);
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return response()->json(['message' => 'Cập nhật thất bại'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
