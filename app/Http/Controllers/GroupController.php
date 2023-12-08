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

    
    public function create()
    {
        $this->authorize('create', Group::class);

        return view('admin.groups.create');
    }

    
    public function store(UserGroupRequest $request)
    {
        $userGroup = new Group();
        $userGroup->name = $request->name;
        $userGroup->save();
        try {
            $userGroup->save();
            return redirect()->route('groups.index')->with('success', __('sys.store_item_success'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('groups.index')->with('error', __('sys.store_item_success'));
        }
    }

    
    public function show($id)
{
    $group = Group::find($id);

    $current_user = Auth::user();
    $userRoles = $group->roles->pluck('id', 'name')->toArray();
    
    $roles = Role::all();
    $group_names = [];

    
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

   
    public function edit($id)
    {
        $userGroup = Group::find($id);
        $this->authorize('update',  $userGroup);
        
        $roles = Role::all()->toArray();
        $group_names = [];
        foreach ($roles as $role) {
            $group_names[$role['group_name']][] = $role;
        }
        $params = [
            
            'group_names' => $group_names,
            'userGroup' => $userGroup
        ];
        return view('admin.groups.edit', $params);
    }

    
    public function update(UpdateUserGroupRequest $request, $id)
    {
        $userGroup = Group::find($id);
        $userGroup->name = $request->name;

        try {
            $userGroup->save();
            
            $userGroup->roles()->detach();
            
            $userGroup->roles()->attach($request->roles);
            return redirect()->route('groups.index')->with('success', __('sys.update_item_success'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('groups.index')->with('error', __('sys.update_item_error'));
        }
    }

    
    public function destroy($id)
    {
        $group = Group::find($id);
        $this->authorize('delete', $group);


        try {
            $group->delete();
            return redirect()->route('userGroups.index')->with('success', __('sys.delete_item_success'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('userGroups.index')->with('error', __('sys.delete_item_error'));
        }
    }
}
