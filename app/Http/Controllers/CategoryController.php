<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $paginate = 2;
        $query = Category::select('*');

        if (isset($request->name)) {
            $query->where('name', 'LIKE', "%$request->name%");
        }
        if (isset($request->status)) {
            $query->where('status', $request->status);
        }
        $query->orderBy('id','DESC');
        $items = $query->paginate($paginate);
        return view('Categories.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $categories = new Category();

        $categories->name = $request->name;
        $categories->description = $request->description;
        $categories->status = $request->status;
        $categories->save();
        return redirect()->route('categories.index')->with('successMessage', 'Thêm thành công');
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
        $categories = Category::find($id);
        return view('categories.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $categories = Category::find($id);
        $categories->name = $request->name;
        $categories->description = $request->description;
        $categories->status = $request->status;

        $categories->save();
        return redirect()->route('categories.index')->with('successMessage', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories = Category::destroy($id);

        return redirect()->route('categories.index')->with('successMessage', 'Xóa thành công');
    }
}
