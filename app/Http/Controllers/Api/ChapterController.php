<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Chapter;
use App\Models\Course;
use Illuminate\Http\Request;

class ChapterController extends Controller
{
    public function index(){
        $items = Chapter::all();
        // return ProductResource::collection($products);
        return response()->json($items);
    }
    public function detail($id)
    {
        $item = Chapter::with('course')->find($id);
        return response()->json($item, 200);
    }
    public function course_list()
    {
        $chapters = Course::with('chapters')->take(10)->get();
        return response()->json($chapters, 200);
    }
    public function product_new()
    {
        $item = Chapter::take(6)->get();
        return response()->json($item, 200);
    }
}
