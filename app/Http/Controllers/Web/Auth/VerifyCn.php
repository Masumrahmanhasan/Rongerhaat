<?php

namespace App\Http\Controllers\Web\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Model\WebAuth;

class VerifyCn extends Controller
{
    public function email_verification($token)
    {
        $data = WebAuth::where(['verify_token' => $token, 'email_verified_at' => null])->first();
        if ($data) {
            if (auth()->guard('web')->loginUsingId($data->id)) {
                $log['login_at']             = \Carbon\Carbon::now();
                $log['email_verified_at']    = \Carbon\Carbon::now();
                $log['online']               = 1;
                $log['status']               = 1;

                WebAuth::whereId(auth()->guard('web')->id())->update($log);
                return redirect()->route('web.user.dashboard');
            }
        } else {
            return redirect()->route('web.home');
        }
    }
}