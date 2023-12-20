<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Http\Requests\CreateLevelRequest;
use App\Http\Requests\StoreLevelRequest;;

use Illuminate\Http\Request;
use App\Traits\UploadFileTrait;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;




class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use UploadFileTrait;

    public function index(Request $request)
    {
        $this->authorize('viewAny', Level::class);
        $query = Level::select('*');
        $limit = $request->limit ? $request->limit : 5;
        if (isset($request->name)) {
            $query->where('name', 'LIKE', "%$request->name%");
        }
        if (isset($request->searchlevel)) {
            $query->where('level', $request->searchlevel);
        }
        if (isset($request->searchstatus)) {
            $query->where('status', $request->searchstatus);
        }

        $query->orderBy('id', 'DESC');
        $items = $query->paginate($limit);
        $params = [
            'items' => $items,

        ];
        return view("admin.levels.index", $params);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Level::class);
        return view('admin.levels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLevelRequest $request)
    {
        try {

            // dd($request->all() );
            $item = new Level();
            $item->name = $request->name;
            $item->level = $request->level;
            $item->status = $request->status;
            // dd($item);
            $item->save();
            Log::info('Level store successfully. ID: ' . $item->id);
            return redirect()->route('levels.index')->with('success', __('Thêm thành công'));
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('levels.index')->with('error', __('Thêm thất bại'));
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
            $item = Level::findOrFail($id);
            $this->authorize('update',  $item);
            $params = [
                'item' => $item
            ];
            return view("admin.levels.edit", $params);
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage());
            return redirect()->route('levels.index')->with('error', __('Không tìm thấy kết quả thích hợp'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());

        try {
            $item = Level::findOrFail($id);
            $item->name = $request->name;
            $item->level = $request->level;
            $item->status = $request->status;
            $item->save();

            return redirect()->route('levels.index')->with('success', __('Cập nhật thành công'));
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage());
            return redirect()->route('levels.index')->with('error', __('Không tìm thấy kết quả thích hợp'));
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('levels.index')->with('error', __('Cập nhật thất bại'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $item = Level::findOrFail($id);
            $this->authorize('delete', $item);
            $item->delete();
            return redirect()->route('levels.index')->with('success', __('Xóa thành công'));
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage());
            return redirect()->route('levels.index')->with('error', __('Không tìm thấy kết quả thích hợp'));
        } catch (QueryException  $e) {
            Log::error($e->getMessage());
            return redirect()->route('levels.index')->with('error', __('Xóa thất bại'));
        }
    }
}
