<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $paginate = 4;
        $query = Order::select('*');
        $course = Course::get();
        $user = User::get();

        if (isset($request->searchname)) {          
            $query->whereHas('user', function ($subquery) use ($request) {
                $subquery->where('name', 'LIKE', "%$request->searchname%");
            });
        }
        if (isset($request->searchphone)) {          
            $query->whereHas('user', function ($subquery) use ($request) {
                $subquery->where('phone', 'LIKE', "%$request->searchphone%");
            });
        }
        if (isset($request->searchcourse_id)) {
            $query->where('course_id', $request->searchcourse_id);
        }
        if (isset($request->searchstatus)) {
            $query->where('status', $request->searchstatus);
            
        }
        
      
        $query->orderBy('id', 'DESC');
        $items = $query->paginate($paginate);
        $params = [
            'items' => $items,
            'courses' => $course,
            'users' => $user, 
            'request'=>$request         
        ];
        return view('admin.orders.index', $params);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
