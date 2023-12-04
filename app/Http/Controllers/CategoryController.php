<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\UploadFileTrait;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use UploadFileTrait;

    public function index(Request $request)
    {
        $paginate = 3;
        $query = Category::select('*');

        if (isset($request->name)) {
            $query->where('name', 'LIKE', "%$request->name%");
        }
        if (isset($request->status)) {
            $query->where('status', $request->status);
        }
        $query->orderBy('id', 'DESC');
        $items = $query->paginate($paginate);
        $params = [
            'items' => $items
        ];
        return view('admin.categories.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $categories = new Category();
        $categories->name = $request->name;
        $categories->description = $request->description;
        $categories->status = $request->status;
        try {
            $categories->save();
            return redirect()->route('categories.index')->with('success', __('sys.store_item_success'));
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('categories.index')->with('error', __('sys.store_item_error'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
            $categories = Category::findOrFail($id);
            $params = [
                'categories' => $categories
            ];
            return view('admin.categories.edit', $params);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, string $id)
    {
        $categories = Category::find($id);

        $categories->name = $request->name;
        $categories->description = $request->description;
        $categories->status = $request->status;
        try {
            $categories->save();
            return redirect()->route('categories.index')->with('success', __('sys.update_item_success'));
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('categories.index')->with('error', __('sys.update_item_error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = Category::destroy($id);

        return redirect()->route('categories.index')->with('success', __('sys.destroy_item_success'));
    }
}
