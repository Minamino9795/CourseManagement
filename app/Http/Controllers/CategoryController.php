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
        $categories = Category::paginate(4);
        $activeStatus = Category::ACTIVE;
        $inactiveStatus = Category::INACTIVE;
        if (isset($request->search)) {
            $search = $request->search;
            $categories = Category::where('name', 'like', "%$search%")
                ->paginate();
        }

        return view('Categories.index', compact('categories', 'activeStatus', 'inactiveStatus'));
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
        $activeStatus = Category::ACTIVE;
        $inactiveStatus = Category::INACTIVE;
        $categories = new Category();

        $categories->name = $request->name;
        $categories->description = $request->description;
        $categories->status = ($request->status == '0') ? $activeStatus : $inactiveStatus;
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
        $activeStatus = Category::ACTIVE;
        $inactiveStatus = Category::INACTIVE;
        $categories = Category::find($id);
        $categories->name = $request->name;
        $categories->description = $request->description;
        $categories->status = ($request->status == '0') ? $activeStatus : $inactiveStatus;

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
