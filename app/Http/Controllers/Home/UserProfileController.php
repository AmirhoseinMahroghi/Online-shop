<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function index()
    {
        return view('home.users_profile.index');
    }

    public function updateUserProfile(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'cellphone' => 'required|ir_mobile:zero'
        ]);

        $user->update([
            'name' => $request->name,
            'cellphone' => $request->cellphone
        ]);

        alert()->success('باتشکر', 'اطلاعات شما با موفقیت انجام شد');
        return redirect()->back();
    }

    public function updateUserProfilePassword(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required|min:8'
        ]);

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        alert()->success('باتشکر', 'رمز عبور شما با موفقیت تغییر کرد');
        return redirect()->back();
    }

    public function logoutUser()
    {
        auth()->logout();
        alert()->success('باتشکر', 'شما از حساب کاربری خود خارج شدید');
        return redirect()->route('login');
    }
}
