<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            $socialite_user = Socialite::driver($provider)->user();
        } catch (\Exception $ex) {
            return redirect()->route('login');
        }

        $user = User::where('email', $socialite_user->getEmail())->first();

        if(!$user){
            $user = User::create([
                'name' => $socialite_user->getName(),
                'email' => $socialite_user->getEmail(),
                'password' => Hash::make($socialite_user->getId()),
                'avater' => $socialite_user->getAvatar(),
                'provider_name' => $provider,
                'email_verified_at' => Carbon::now()
            ]);
        }

        auth()->login($user, $remember = true);
        alert()->success('تشکر', 'ورود شما موفقیت امیز بود')->persistent('حله');
        return redirect()->route('home.index');
    }
}
