<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest()->paginate(20);
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'display_name' => 'required'
        ]);

        try {
            DB::beginTransaction();

            $role = Role::create([
                'name' => $request->name,
                'display_name' => $request->display_name,
            ]);

            $permission = $request->except('_token', 'display_name', 'name');
            $role->givePermissionTo($permission);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ثبت نقش', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }

        alert()->success('باتشکر', 'نقش با موفقیت ثبت گردید')->persistent('حله');
        return redirect()->route('admin.roles.index');
    }

    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required',
            'display_name' => 'required'
        ]);

        try {
            DB::beginTransaction();

            $role->update([
                'name' => $request->name,
                'display_name' => $request->display_name,
            ]);

            $permission = $request->except('_token', 'display_name', 'name','_method');
            $role->syncPermissions($permission);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ویرایش نقش', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }

        alert()->success('باتشکر', 'نقش با موفقیت ویرایش گردید')->persistent('حله');
        return redirect()->route('admin.roles.index');
    }
}
