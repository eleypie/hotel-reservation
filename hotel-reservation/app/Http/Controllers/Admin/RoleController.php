<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::orderBy('name', 'asc')->get();
        return view('admin.roles.viewRoles', compact('roles', 'permissions'));
    }

    public function create()
    {
        $rolePermissions = [];
        $permissions = Permission::orderBy('name', 'asc')->get();
        return view('admin.roles.createRoles', compact('permissions', 'rolePermissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'array|exists:permissions,id',
        ]);
        $permissions = Permission::whereIn('id', $request->permissions)->pluck('name');

        $role = Role::create([
            'name' => $request->name,
            'guard_name' => 'web'
        ]);
        
        $role->syncPermissions($permissions);
        return redirect()->route('admin-roles')->with('success', 'Role created successfully.');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::orderBy('name', 'asc')->get();
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return view('admin.roles.editRoles', compact('role', 'permissions', 'rolePermissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'permissions' => 'array|exists:permissions,id',
        ]);

        $role->name = $request->name;
        $role->save();

        $permissionNames = Permission::whereIn('id', $request->permissions ?? [])->pluck('name');
        $role->syncPermissions($permissionNames);

        return redirect()->route('admin-roles')->with('success', 'Role updated successfully.');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->route('admin-roles')->with('success', 'Role deleted successfully.');
    }
}
