<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\OTPSms;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OtpController extends Controller
{
    public function login(Request $request)
    {
        if ($request->method() == 'GET') {
            return view('auth.OTP.login_cellphone');
        }

        $request->validate([
            'cellphone' => 'required|ir_mobile:zero'
        ]);

        try {

            $user = User::where('cellphone', $request->cellphone)->first();
            $OTPCode = mt_rand(100000, 999999);
            $loginToken = Hash::make('FresSrg@wsRasa%dSs%odY!!Axowcr');

            if ($user) {
                $user->update([
                    'otp' => $OTPCode,
                    'login_token' => $loginToken
                ]);
            } else {
                $user = User::create([
                    'cellphone' => $request->cellphone,
                    'otp' => $OTPCode,
                    'login_token' => $loginToken
                ]);
            }
            $user->notify(new OTPSms($OTPCode));

            return response(['loginToken' => $loginToken], 200);
        } catch (Exception $ex) {
            return response(['errors' => $ex->getMessage()], 422);
        }
    }
}
