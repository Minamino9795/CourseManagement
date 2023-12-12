<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateChapterRequest;

use App\Models\Chapter;
use App\Models\Course;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ChapterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Chapter::class);
        $limit = $request->limit ? $request->limit : 2;
        $query = Chapter::select('*');
        if (isset($request->s)) {
            $query->whereHas('course', function ($query) use ($request) {
                $query->where('name', 'like', "%$request->s%");
            });
        }

        if ($request->name) {
            $query->where('name', $request->name);
        }
        if ($request->course_id) {
            $query->where('course_id', $request->course_id);
        }
        $query->orderBy('id', 'DESC');
        $items = $query->with('course')->paginate($limit);
        $params =
            [
                'items' => $items,
            ];
        return view('admin.chapters.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Chapter::class);
        $courses = Course::all();
        $params =
            [
                'courses' => $courses,
            ];
        return view('admin.chapters.create', $params);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // dd($request->all());
            $item = new Chapter();
            $request->validate([
                'name' => ['required', 'unique:chapters,name,NULL,id,course_id,' . $request->course_id],
                // Các quy tắc validate khác
            ]);
            $item->name = $request->name;
            $item->course_id = $request->course_id;
            $item->save();
            Log::info('Chapter store successfully. ID: ' . $item->id);

            return redirect()->route('chapters.index')->with('success', __('Thêm thành công'));
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            dd($e->getMessage());
            return redirect()->route('chapters.index')->with('error', __('Thêm thất bại'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $item = Chapter::findOrFail($id);
            $this->authorize('update',  $item);
            $courses = Course::all();
            $params = [
                'item' => $item,
                'courses' => $courses,
            ];
            return view("admin.chapters.edit", $params);
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage());
            return redirect()->route('chapters.index')->with('error', __('Không tìm thấy kết quả thích hợp'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $item = Chapter::findOrFail($id);
            $item->name = $request->name;
            $item->course_id = $request->course_id;
            $item->save();
            return redirect()->route('chapters.index')->with('success', __('Cập nhật thành công'));
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage());
            return redirect()->route('chapters.index')->with('error', __('Không tìm thấy kết quả thích hợp'));
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            dd($e->getMessage());

            return redirect()->route('chapters.index')->with('error', __('Cập nhật thất bại'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $item = Chapter::findOrFail($id);
            $this->authorize('delete', $item);
            $item->delete();
            return redirect()->route('chapters.index')->with('success', __('Xóa thành công'));
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage());
            return redirect()->route('chapters.index')->with('error', __('sKhông tìm thấy kết quả thích hợp'));
        } catch (QueryException  $e) {
            Log::error($e->getMessage());
            return redirect()->route('chapters.index')->with('error', __('Xóa thất bại'));
        }
    }
}
