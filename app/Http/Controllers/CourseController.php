<?php

namespace App\Http\Controllers;
use App\Models\Course;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Course::all();
        $params = [
            'items' => $items,
        ];
        return view ("admin.courses.index", $params);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $item = Course::get();
        $param = [
            'item' => $item,
        ];
        return view('admin.courses.create', $param) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $item = new Course();
        $item->name = $request->name;
        $item->price = $request->price;
        $item->description = $request->description;
        $item->status = $request->status;
        $item->category_id = $request->category_id;
        $item->level_id = $request->level_id;
        $item->image_url = $request->image_url;
        $item->video_url = $request->video_url;
        // dd($item);
        $item->save();
 return redirect()->route('courses.index');
        
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