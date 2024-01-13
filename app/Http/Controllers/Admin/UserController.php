<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $users = User::all();
        return view('admin.users.index', compact('users', 'roles'));
    }

    public function show(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();

        return view('admin.users.role', compact('user', 'roles', 'permissions'));
    }

    public function assignRole(Request $request, User $user)
    {
        if($user->hasRole($request->role)){
            return back()->with('message', 'Role exists.');
        }

        $user->assignRole($request->role);
            return back()->with('message', 'Role has been Assigned Successfuly!');
    }

    public function removeRole(User $user, Role $role)
    {
        if($user->hasRole($role)){

            $user->removeRole($role);

            return back()->with('message', 'Role has been Removed.');
        }

    }

    public function givePermission(Request $request, User $user)
    {
        if($user->hasPermissionTo($request->permission)){
            return back()->with('message', 'Permission exists.');
        }
        $user->givePermissionTo($request->permission);
            return back()->with('message', 'Permission has been Added Successfuly!');
    }

    public function revokePermission(User $user, Permission $permission)
    {
        if($user->hasPermissionTo($permission)){

            $user->revokePermissionTo($permission);

            return back()->with('message', 'Permission has been deleted.');
        }

    }

    public function destroy(User $user)
    {
        if($user->hasRole('admin')){
            return back()->with('message', 'You are admin!');
        }
        $user->delete();

        return back()->with('message', 'User has been deleted successfully.');
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole($request->role_id);

        event(new Registered($user));

        return to_route('admin.users.index')->with('message', 'User has been Created Successfully!');
    }
}
