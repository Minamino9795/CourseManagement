<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lession;
use Illuminate\Http\Request;

class LessionController extends Controller
{
    public function index(){
        $items = Lession::all();
        // return ProductResource::collection($products);
        return response()->json($items);
    }
  
    
    public function lession_new()
    {
        $lession = Lession::take(6)->get();
        return response()->json($lession, 200);
    }
}
