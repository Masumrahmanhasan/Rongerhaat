<?php

namespace App\Http\Controllers\Web\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\WebAuth;

class LogoutCn extends Controller
{
    public function logout(Request $request)
    {
        $log['online']          = 0;
        $log['logout_at']       = \Carbon\Carbon::now();
        WebAuth::whereId(auth()->guard('web')->id())->update($log);
        
        auth()->guard('web')->logout();
        return redirect()->route('web.home');
    }
}