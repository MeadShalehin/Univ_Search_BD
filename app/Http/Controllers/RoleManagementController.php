<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleManagementController extends Controller
{
    function index()
    {
        // return
        $roles = Role::with('permissions')->get();
        $permissions = Permission::all();


        return view('adminpanel.role.index', compact('roles','permissions'));
    }

    function role_add(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Role::create(['name' =>  strtolower($request->name)]);
        return back()->with('success', 'Successfully Role has been created!');
    }

    function role_delete($id)
    {
        $role = Role::findById($id);
        $role->delete();
        return back()->with('success', 'Successfully Role has been deleted!');

    }

    function get_role($id)
    {
        $role = Role::findById($id);

        return response()->json([
            'data' => $role
        
        ]);

    }

    function role_update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role_id' => 'required'
        ]);
        $role = Role::findById($request->role_id);
        $role->name = strtolower($request->name);
        $role->save();

        return back()->with('success', 'Successfully Role has been updated!');
    }






    function permission_add(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Permission::create(['name' =>  strtolower($request->name)]);
        return back()->with('success', 'Successfully Permission has been created!');
    }

    function permission_delete($id)
    {
        // return
        $permission = Permission::findById($id);
        $permission->delete();
        return back()->with('success', 'Successfully Permission has been deleted!');

    }

    function get_permission($id)
    {
        $permission = Permission::findById($id);

        return response()->json([
            'data' => $permission
        
        ]);

    }

    function permission_update(Request $request)
    {

        // return $request;
        $request->validate([
            'name' => 'required',
            'permission_id' => 'required'
        ]);
        $permission = Permission::findById($request->permission_id);
        $permission->name = strtolower($request->name);
        $permission->save();

        return back()->with('success', 'Successfully Role has been updated!');
    }




    function role_permission_assign(Request $req)
    {
        $req->validate([
            'role_id' => 'required',
            'selected_permission' => 'required'
        ]);

        $role = Role::findById($req->role_id);
        $role->givePermissionTo($req->selected_permission);
        return back()->with('success', 'Successfully Permission Assigned!');
    }

    function role_permission_revoke($id)
    {
        $role = Role::findById($id);
        $role->syncPermissions([]);

        return back()->with('success', 'Permission Revoked from the role!');

    }
}
