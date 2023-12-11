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
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    use UploadFileTrait;
    public function index(Request $request)
    {
        $this->authorize('viewAny', User::class);
        $query = User::select('*');
        if (isset($request->name)) {
            $query->where('name', 'LIKE', "%$request->name%");
        }
        if (isset($request->email)) {
            $query->where('email', 'LIKE', "%$request->email%");
        }      
        if (isset($request->phone)) {
            $query->where('phone', 'LIKE', "%$request->phone%");
        }   
        if (isset($request->group_id)) {
            $query->where('group_id', $request->group_id);
        }   
        $query->orderBy('id', 'desc');
        $users = $query->paginate(20);
        $groups = Group::all();
        $params = [
            'users' => $users,
            'groups' =>  $groups,
            'request' => $request,
            'user_role' => 'all'
        ];
        return view('admin.users.index', $params);
    }


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

            return redirect()->route('users.index')->with('success', __('sys.store_item_success'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('users.index')->with('error', __('sys.store_item_error'));
        }
    }

    public function show(string $id)
    {
        try {
            $item = User::findOrFail($id);          
            $group = Group::get();
            $params = [
                'groups' => $group,
                'item' => $item
            ];
            return view("admin.users.show", $params);
        } catch (ModelNotFoundException $e) {
            Log::error($e->getMessage());
            return redirect()->route('users.index')->with('error', __('sys.item_not_found'));
        }
    }


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

    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);
        $oldPassword            = $user->password;
        $user->name             = $request->name;
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
        if ($request->password) {
            $user->password         = Hash::make($request->password);
        } else {
            
            $user->password = $oldPassword;
        }

        try {
            $user->save();

            return redirect()->route('users.index')->with('success', __('sys.update_item_success'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', __('sys.update_item_error'));
        }
    }


    public function destroy($id)
    {
        $user = User::find($id);
        $this->authorize('delete', $user);


        try {
            $user->delete();
            return redirect()->route('users.index')->with('success', __('sys.delete_item_success'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('users.index')->with('error', __('sys.delete_item_error'));
        }
    }
}
