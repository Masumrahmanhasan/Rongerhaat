<?php

namespace App\Http\Controllers\Software\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\SoftwareAuth;

class LogoutCn extends Controller
{
    public function logout(Request $request)
    {
        $log['online']          = 0;
        $log['logout_at']       = \Carbon\Carbon::now();
        SoftwareAuth::whereId(auth()->guard('superadmin')->id())->update($log);
        
        auth()->guard('superadmin')->logout();
        return redirect()->route('software.auth.login.index');
    }
}