<?php

namespace App\Http\Controllers;
use App\Models\Level;
use App\Http\Requests\CreateLevelRequest;
;
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
        $query = Level::select('*');
        $limit = $request->limit ? $request->limit : 5;

        if (isset($request->s)) {
            $query->where('name', 'like', "%$request->name%")
                ->orWhere('level', 'like', "%$request->level%")
                ->orWhere('status', 'like', "%$request->status%");
        }
        if ($request->name) {
            $query->where('name',$request->name);
        }
        if ($request->level) {
            $query->where('level',$request->level);

        }  if ($request->status) {
            $query->where('status',$request->status);
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
       
       return view ('admin.levels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateLevelRequest $request)
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
            return redirect()->route('levels.index')->with('success', __('sys.store_item_success'));
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('levels.index')->with('error', __('sys.store_item_error'));
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
            $params = [
                'item' => $item
            ];
            return view("admin.levels.edit", $params);
            } 
        catch (ModelNotFoundException $e) 
            {
            Log::error($e->getMessage());
            return redirect()->route('levels.index')->with('error', __('sys.item_not_found'));
            }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CreateLevelRequest  $request, string $id)
    {
        // dd($request->all());

        try
        {
            $item = Level::findOrFail($id);
            $item->name = $request->name;
            $item->level = $request->level;
            $item->status = $request->status;
            $item->save();

            return redirect()->route('levels.index')->with('success', __('sys.update_item_success'));
        }
        catch (ModelNotFoundException $e) {
            Log::error($e->getMessage());
            return redirect()->route('levels.index')->with('error', __('sys.item_not_found'));
        } catch (QueryException $e) {
            Log::error($e->getMessage());
            return redirect()->route('levels.index')->with('error', __('sys.update_item_error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $item = Level::findOrFail($id);
            $item->delete();
            return redirect()->route('levels.index')->with('success', __('sys.destroy_item_success'));
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage());
            return redirect()->route('levels.index')->with('error', __('sys.item_not_found'));
        } catch (QueryException  $e) {
            Log::error($e->getMessage());
            return redirect()->route('levels.index')->with('error', __('sys.destroy_item_error'));
        }
    }
}
