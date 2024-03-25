<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.users.edit', compact('user', 'roles', 'permissions'));
    }

    public function update(Request $request, User $user)
    {
        if ($request->has('avater')) {
            $fileNameImage = genrateFileName($request->avater->getClientOriginalName());
            $request->avater->move(public_path(env('USERS_IMAGES_UPLOAD_PATH')), $fileNameImage);
        }

        try {
            DB::beginTransaction();
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'cellphone' => $request->cellphone,
                'avater' => $request->has('avater') ? $fileNameImage : $user->avater
            ]);

            $user->syncRoles($request->role);
            $permission = $request->except('_token', '_method', 'name', 'email', 'cellphone', 'role', 'avater');
            $user->syncPermissions($permission);

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollBack();
            alert()->error('مشکل در ویرایش نقش', $ex->getMessage())->persistent('حله');
            return redirect()->back();
        }

        alert()->success('باتشکر', 'کاربر با موفقیت ویرایش گردید')->persistent('حله');
        return redirect()->route('admin.users.index');
    }
}
