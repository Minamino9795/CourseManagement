<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseRequest;
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
        $category = Category::get();
        $levels = Level::get();

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
            'items' => $items,
            'categories' => $category,
            'levels' => $levels
        ];
        return view('admin.courses.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::get();
        $levels = Level::get();
        $params = [
            'categories' => $category,
            'levels' => $levels
        ];
        return view('admin.courses.create', $params);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
        $courses = new Course();
        $courses->name = $request->name;
        $courses->price = $request->price;
        $courses->description = $request->description;
        $courses->status = $request->status;
        $courses->category_id = $request->category_id;
        $courses->level_id = $request->level_id;
        $courses->image_url = $request->image_url;

        if ($request->hasFile('image_url')) {
            $courses->image_url = $this->uploadFile($request->file('image_url'), 'uploads');
        }
        $courses->video_url = $request->video_url;

        // dd($courses);
        try {
            $courses->save();
            return redirect()->route('courses.index')->with('success', __('sys.store_item_success'));
        } catch (QueryException $e) {
            if ($courses->image_url) {
                $this->deleteFile([$courses->image_url]);
            }
            Log::error($e->getMessage());
            return redirect()->route('courses.index')->with('error', __('sys.store_item_error'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $categories = Category::get();
            $levels = Level::get();
            $item = Course::findOrFail($id);
            $params = [
                'item' => $item,
                'categories' => $categories,
                'levels' => $levels
            ];
            return view("admin.courses.show", $params);
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('asset.index')->with('error', __('sys.item_not_found'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $categories = Category::get();
            $levels = Level::get();
            $item = Course::findOrFail($id);
            // dd($item);
            $params = [
                'item' => $item,
                'categories' => $categories,
                'levels' => $levels,
            ];
            return view("admin.courses.edit", $params);
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('courses.index')->with('error', __('sys.item_not_found'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, string $id)
    {
        try {
            $item = Course::findOrFail($id);
            $item->name = $request->name;
            $item->price = $request->price;
            $item->description = $request->description;
            $item->status = $request->status;
            $item->category_id = $request->category_id;
            $item->level_id = $request->level_id;
            // $item->image_url = $request->image_url;

            if ($request->hasFile('image_url')) {
                $item->image_url = $this->uploadFile($request->file('image_url'), 'uploads');
            }
            $item->video_url = $request->video_url;
            // dd($item);
            $item->save();
            return redirect()->route('courses.index')->with('success', __('sys.update_item_success'));
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('courses.index')->with('error', __('sys.item_not_found'));
        } catch (QueryException  $e) {
            Log::error($e->getMessage());
            return redirect()->route('courses.index')->with('error', __('sys.update_item_error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $item = Course::findOrFail($id);
            $item->delete();
            return redirect()->route('courses.index')->with('success', __('sys.destroy_item_success'));
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('courses.index')->with('error', __('sys.item_not_found'));
        } catch (QueryException  $e) {
            Log::error($e->getMessage());
            return redirect()->route('courses.index')->with('error', __('sys.destroy_item_error'));
        }
    }
}
