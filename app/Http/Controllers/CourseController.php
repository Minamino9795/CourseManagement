<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use App\Traits\UploadFileTrait;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CourseController extends Controller
{
    use UploadFileTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $paginate = 3;
        $query = Course::select('*');

        if (isset($request->name)) {
            $query->where('name', 'LIKE', "%$request->name%");
        }
        if (isset($request->status)) {
            $query->where('status', $request->status);
        }
        if (isset($request->category_id)) {
            $query->where('category_id', $request->category_id);
        }
        if (isset($request->level_id)) {
            $query->where('level_id', $request->level_id);
        }
        $query->orderBy('id', 'DESC');
        $items = $query->paginate($paginate);
        $params = [
            'items' => $items
        ];
        return view('admin.courses.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        $levels = Level::get();
        $params = [
            'categories' => $categories,
            'levels' => $levels
        ];
        return view('admin.courses.create', $params);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $courses = new Course();
        $courses->name = $request->name;
        $courses->price = $request->price;
        $courses->description = $request->description;
        $courses->status = $request->status;
        $courses->category_id = $request->category_id;
        $courses->level_id = $request->level_id;
        if ($request->hasFile('image_url')) {
            $courses->image_url = $this->uploadFile($request->file('image_url'), 'image_url');
        }
        if ($request->hasFile('video_url')) {
            $courses->video_url = $this->uploadFile($request->file('video_url'), 'video_url');
        }
        
        // dd($courses);
        try {
            $courses->save();
            return redirect()->route('courses.index')->with('success', __('sys.store_item_success'));
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('courses.index')->with('error', __('sys.store_item_error'));
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
}
