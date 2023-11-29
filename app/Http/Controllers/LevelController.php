<?php

namespace App\Http\Controllers;
use App\Models\Level;
use Illuminate\Http\Request;
use App\Traits\UploadFileTrait;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Log;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use UploadFileTrait;

    public function index(Request $request)
    {
        $query = Level::select('*');
        if (isset($request->s)) {
            $query->where('name', 'like', "%$request->s%")
                ->orWhere('level', 'like', "%$request->s%")
                ->orWhere('status', 'like', "%$request->s%");
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
        $items = $query->paginate(3);
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
        $item = Level::get();
        $param = [
            'item' => $item,
        ];
       return view ('admin.levels.create',$param);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $item = new Level();
        $item->name = $request->name;
        $item->level = $request->level;
        $item->status = $request->status;
        // dd($item);
       $item->save();
       return redirect()->route('levels.index');
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
