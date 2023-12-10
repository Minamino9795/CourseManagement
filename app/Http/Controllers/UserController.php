<?php

namespace App\Http\Controllers;

use App\Events\UserSubmitEvent;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\UpdateUserGroupRequest;
use App\Models\User;
use App\Models\Group;
use Illuminate\Http\Request;
use App\Traits\UploadFileTrait;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use UploadFileTrait;
    public function index(Request $request)
    {
        $this->authorize('viewAny', User::class);
        $query = User::select('*');
        if (isset($request->filter['name']) && $request->filter['name']) {
            $name = $request->filter['name'];
            $query->where('name', 'LIKE', '%' . $name . '%');
        }
        if (isset($request->filter['email']) && $request->filter['email']) {
            $email = $request->filter['email'];
            $query->where('email', 'LIKE', '%' . $email . '%');
        }
        if (isset($request->filter['image']) && $request->filter['image']) {
            $image = $request->filter['image'];
            $query->where('image', $image);
        }
        if (isset($request->filter['phone']) && $request->filter['phone']) {
            $phone = $request->filter['phone'];
            $query->where('phone', $phone);
        }
        if (isset($request->filter['address']) && $request->filter['address']) {
            $address = $request->filter['address'];
            $query->where('address', $address);
        }
        if (isset($request->filter['gender']) && $request->filter['gender']) {
            $gender = $request->filter['gender'];
            $query->where('gender', 'LIKE', '%' . $gender . '%');
        }
        if (isset($request->filter['birthday']) && $request->filter['birthday']) {
            $birthday = $request->filter['birthday'];
            $query->where('birthday', 'LIKE', '%' . $birthday . '%');
        }
        if (isset($request->filter['group_id']) && $request->filter['group_id']) {
            $group_id = $request->filter['group_id'];
            $query->where('group_id', 'LIKE', '%' . $group_id . '%');
        }
        if (isset($request->filter['status']) && $request->filter['status']) {
            $status = $request->filter['status'];
            $query->where('status', 'LIKE', '%' . $status . '%');
        }
        if ($request->s) {
            $query->where('name', 'LIKE', '%' . $request->s . '%');
            $query->orwhere('id', $request->s);
        }


        $query->orderBy('id', 'desc');
        $users = $query->paginate(20);
        // dd($users);
        $groups = Group::all();
        // $branches = Branch::all();
        // $provinces = Province::all();

        $params = [
            // 'provinces' => $provinces,
            'users' => $users,
            'groups' =>  $groups,
            // 'branches' => $branches,
            'filter' => $request->filter,
            'user_role' => 'all'
        ];
        return view('admin.users.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', User::class);
        $users = User::select('*');
        $groups = Group::get();
        $users = $users->paginate(3);
        $params = [
            'groups' => $groups,
            'users' => $users
        ];
        return view('admin.users.create', $params);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $user = new User();
        $user->name             = $request->name;
        $user->password         = $request->password;
        $user->gender           = $request->gender;
        $user->birthday         = $request->birthday;
        $user->address          = $request->address;
        $user->email            = $request->email;
        $user->phone            = $request->phone;
        $user->group_id         = $request->group_id;
        $user->status           = $request->status;


        $fieldName = 'image';
        if ($request->hasFile($fieldName)) {
            $get_img = $request->file($fieldName);
            $path = 'storage/user/';
            $new_name_img = rand(1, 100) . $get_img->getClientOriginalName();
            $get_img->move($path, $new_name_img);
            $user->image = $path . $new_name_img;
        }

        try {

            $user->save();
            // $user->active = 'store';
            return redirect()->route('users.index')->with('success', 'Thêm' . ' ' . $request->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('users.index')->with('error', 'Thêm' . ' ' . $request->name . ' ' .  'không thành công');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user =  User::find($id);
        $this->authorize('update', $user);
        $groups = Group::all();;
        $params = [
            'user' => $user,
            'groups' => $groups,
        ];
        return view('admin.users.edit', $params);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);
        $user->name             = $request->name;
        if ($request->password) {
            $user->password         = Hash::make($request->password);
        }
        $user->gender           = $request->gender;
        $user->birthday         = $request->birthday;
        $user->address          = $request->address;
        $user->email            = $request->email;
        $user->phone            = $request->phone;
        $user->group_id         = $request->group_id;
        $user->status           = $request->status;


        $fieldName = 'image';
        // dd($request);
        if ($request->hasFile($fieldName)) {
            $get_img = $request->file($fieldName);
            $path = 'storage/user/';
            $new_name_img = rand(1, 100) . $get_img->getClientOriginalName();
            $get_img->move($path, $new_name_img);
            $user->image = $path . $new_name_img;
        }
        // dd($imagePath); 
        try {
            $user->save();
            // $user->active = 'update';
            return redirect()->route('users.index')->with('success', 'Sửa' . ' ' . $request->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', 'Sửa' . ' ' . $request->name . ' ' .  'không thành công');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $this->authorize('delete', $user);
        try {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'Xóa  thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('users.index')->with('error', 'Xóa không  thành công');
        }
    }
    public function trashedItems(Request $request)
    {
        $query = User::onlyTrashed();
        //sắp xếp thứ tự lên trước khi update
        $query->orderBy('id', 'desc');
        $users = $query->paginate(20);
        // dd($users);
        $groups = Group::all();

        $params = [

            'users' => $users,
            'groups' =>  $groups,
            'filter' => $request->filter,
            'user_role' => 'trash'
        ];
        return view('admin.users.trash', $params);
    }
    public function force_destroy($id)
    {

        $user = User::withTrashed()->find($id);
        // dd($user);
        try {
            $user->forceDelete();
            return redirect()->route('users.trash')->with('success', 'Xóa' . ' ' . $user->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('users.trash')->with('error', 'Xóa' . ' ' . $user->name . ' ' .  'không thành công');
        }
    }
    public function restore($id)
    {
        $user = User::withTrashed()->find($id);
        try {
            $user->restore();
            return redirect()->route('users.trash')->with('success', 'Khôi phục' . ' ' . $user->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('users.trash')->with('error', 'Khôi phục' . ' ' . $user->name . ' ' .  'không thành công');
        }
    }
}
