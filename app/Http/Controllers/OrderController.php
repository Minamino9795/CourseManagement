<?php

namespace App\Http\Controllers;

use App\Exports\OrderExport;
use App\Http\Requests\OrderRequest;
use App\Models\Course;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Order::class);
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
            'request' => $request
        ];
        return view('admin.orders.index', $params);
    }
    public function edit(string $id)
    {
        try {
            $item = Order::findOrFail($id);
            $this->authorize('update',  $item);
            $courses = Course::get();
            $user = User::get();
            // dd($item);
            $params = [
                'item' => $item,
                'courses' => $courses,
                'users' => $user,
            ];
            return view("admin.orders.edit", $params);
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage());
            return redirect()->route('orders.index')->with('error', __('sys.item_not_found'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request, string $id)
    {
        try {
            $item = Order::findOrFail($id);
            $item->status = $request->status;
            // dd($item);
            $item->save();
            return redirect()->route('orders.index')->with('success', __('Cập nhật thành công'));
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage());
            return redirect()->route('orders.index')->with('error', __('Không tìm thấy kết quả thích hợp'));
        } catch (QueryException  $e) {
            Log::error($e->getMessage());
            return redirect()->route('orders.index')->with('error', __('Cập nhật thất bại'));
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $item = Order::findOrFail($id);
            $this->authorize('delete', $item);
            $item->delete();
            return redirect()->route('orders.index')->with('success', __('Xóa thành công'));
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage());
            return redirect()->route('orders.index')->with('error', __('Không tìm thấy kết quả thích hợp'));
        } catch (QueryException  $e) {
            Log::error($e->getMessage());
            return redirect()->route('orders.index')->with('error', __('Xóa thất bại'));
        }
    }

    public function exportOrder()
    {
        return Excel::download(new OrderExport(), 'orders.xlsx');
    }
}
