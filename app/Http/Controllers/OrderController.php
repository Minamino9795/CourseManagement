<?php

namespace App\Http\Controllers;

use App\Exports\OrderExport;
use App\Models\Course;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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
    
    public function exportOrder()
    {
        return Excel::download(new OrderExport(), 'orders.xlsx');
    }
}
