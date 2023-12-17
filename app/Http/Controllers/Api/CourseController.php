<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;

class CourseController extends Controller
{
    public function index(){
        $items = Course::all();
        // return ProductResource::collection($products);
        return response()->json($items);
    }
  
    
    public function lession_new()
    {
        $lession = Course::take(6)->get();
        return response()->json($lession, 200);
    }
}
