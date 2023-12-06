<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserGroupRequest;
use App\Http\Requests\UpdateUserGroupRequest;
class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny',Group::class);
        $users = User::get();

        $query = Group::select('*');
        if (isset($request->filter['name']) && $request->filter['name']) {
            $name = $request->filter['name'];
            $query->where('name', 'LIKE', '%' . $name . '%');
        }
        if ($request->s) {
            $query->where('name', 'LIKE', '%' . $request->s . '%');
            $query->orwhere('id', $request->s);
        }

        $query->orderBy('id', 'desc');
        $userGroups = $query->paginate(4);
        
        $params = [
            'filter' => $request->filter,
            'userGroups' => $userGroups,
            'users' => $users
        ];
        return view('admin.groups.index', $params);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Group::class);

        return view('admin.groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserGroupRequest $request)
    {
        $userGroup = new Group();
        $userGroup->name = $request->name;
        $userGroup->save();
        try {
            $userGroup->save();
            return redirect()->route('groups.index')->with('success', 'Thêm' . ' ' . $request->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('groups.index')->with('error', 'Thêm' . ' ' . $request->name . ' ' .  'không thành công');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    $group = Group::find($id);

    $current_user = Auth::user();
    $userRoles = $group->roles->pluck('id', 'name')->toArray();
    // dd($userRoles);
    $roles = Role::all();
    $group_names = [];

    /////lấy tên nhóm quyền
    foreach ($roles as $role) {
        $group_names[$role->group_name][] = $role;
    }

    $params = [
        'group' => $group,
        'userRoles' => $userRoles,
        'roles' => $roles,
        'group_names' => $group_names,
    ];

    return view('admin.groups.show', $params);
}

public function group_role(Request $request, $id)
{
    try {
        $group = Group::find($id);
        $group->roles()->detach();
        $group->roles()->attach($request->roles);

        return redirect()->route('groups.index')->with('success', 'Cấp quyền thành công !');
    } catch (\Exception $e) {
        return redirect()->route('groups.index')->with('error', 'Đã xảy ra lỗi khi cấp quyền: ' . $e->getMessage());
    }
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $userGroup = Group::find($id);
        $this->authorize('update',  $userGroup);
        // $current_user = Auth::user();
        // $userRoles = $userGroup->roles->pluck('id', 'name')->toArray();
        // dd($current_user->userGroup->roles->toArray());
        $roles = Role::all()->toArray();
        $group_names = [];
        foreach ($roles as $role) {
            $group_names[$role['group_name']][] = $role;
        }
        $params = [
            // 'userRoles' => $userRoles,
            'group_names' => $group_names,
            'userGroup' => $userGroup
        ];
        return view('admin.groups.edit', $params);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserGroupRequest $request, $id)
    {
        $userGroup = Group::find($id);
        $userGroup->name = $request->name;

        try {
            $userGroup->save();
            //detach xóa hết tất cả các record của bảng trung gian hiện tại
            $userGroup->roles()->detach();
            //attach cập nhập các record của bảng trung gian hiện tại
            $userGroup->roles()->attach($request->roles);
            return redirect()->route('groups.index')->with('success', 'Sửa' . ' ' . $request->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('groups.index')->with('error', 'Sửa' . ' ' . $request->name . ' ' .  ' không thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $group = Group::find($id);
        $this->authorize('delete', $group);


        try {
            $group->delete();
            return redirect()->route('userGroups.index')->with('success', 'Xóa  thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('userGroups.index')->with('error', 'Xóa không thành công');
        }
    }
}
