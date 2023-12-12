<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index(){
        $items = Level::all();
        // return ProductResource::collection($products);
        return response()->json($items);
    }
    public function product_new()
    {
        $item = Level::take(6)->get();
        return response()->json($item, 200);
    }
}
