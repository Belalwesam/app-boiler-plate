<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleRequest;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $permissions = Permission::all()->groupBy('permission_group');
        $roles = Role::all();
        foreach ($roles as $role) {
            $role_users = Admin::role($role)->get();
            $role->users = $role_users;
        }
        return view('admin.pages.roles.index', compact('permissions', 'roles'));
    }
    public function store(RoleRequest $request)
    {
        $role = Role::create(['name' => $request->name, 'guard_name' => 'admin']);
        if ($request->has('permissions') && $request->filled('permissions')) {
            $permissions = Permission::whereIn('id', $request->permissions)->get();
            $role->syncPermissions($permissions);
        }
        return http_response_code(200);
    }
    public function update(RoleRequest $request)
    {
        $role = Role::find($request->id);
        $role->update($request->validated());
        $role->syncPermissions([]);
        if ($request->has('permissions') && $request->filled('permissions')) {
            $permissions = Permission::whereIn('id', $request->permissions)->get();
            $role->syncPermissions($permissions);
        }
        return http_response_code(200);
    }
}
