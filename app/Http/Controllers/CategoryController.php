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
        $this->authorize('viewAny', Category::class);
        $paginate = 3;
        $query = Category::select('*');

        if (isset($request->searchname)) {
            $query->where('name', 'LIKE', "%$request->searchname%");
        }
        if (isset($request->searchstatus)) {
            $query->where('status', $request->searchstatus);
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
        $this->authorize('create', Category::class);

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
            return redirect()->route('categories.index')->with('success', __('Thêm thành công'));
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('categories.index')->with('error', __('Thêm thất bại'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try{
            $items= Category::findOrFail($id);
            $this->authorize('view', $items);
            $params= [
                'items'=>$items
            ];
            return view('admin.categories.show',$params);
        }catch(QueryException $e){
            Log::error($e->getMessage());
            return redirect()->route('categories.index')->with('error', __('Không tìm thấy kết quả thích hợp'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
            $categories = Category::findOrFail($id);
            $this->authorize('update',  $categories);
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
            return redirect()->route('categories.index')->with('success', __('Cập nhật thành công'));
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('categories.index')->with('error', __('Cập nhật thất bại'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $item = Category::findOrFail($id);
            $this->authorize('delete', $item);
            $item->delete();
            return redirect()->route('categories.index')->with('success', __('Xóa thành công'));
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('categories.index')->with('error', __('Không tìm thấy kết quả thích hợp'));
        } catch (QueryException  $e) {
            Log::error($e->getMessage());
            return redirect()->route('categories.index')->with('error', __('Xóa thất bại'));
        }
    }
}
