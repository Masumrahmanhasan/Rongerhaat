<?php

namespace App\Http\Controllers\Software\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\SoftwareAuth;
use App\Model\Basic;

class LoginCn extends Controller
{
    public function index()
    {
        session()->put('basic', Basic::find(1));
        
        if (auth()->guard('superadmin')->check()) {
            return redirect()->route('superadmin.dashboard');
        }
        return view('software.auth.login');
    }

    public function login(Request $request)
    {
        $username    = $request->username;
        $password    = $request->password;

        if (auth()->guard('superadmin')->attempt(['username' => $username, 'password' => $password, 'status' => 1])) {
            $log['online']          = 1;
            $log['login_at']        = \Carbon\Carbon::now();

            Softwareauth::whereId(auth()->guard('superadmin')->id())->update($log);
            session()->flash('login', 'Success');
        } else {
            session()->flash('login', 'Failed');
            return redirect()->route('software.auth.login.index');
        }

        return redirect()->route('superadmin.dashboard');
    }
}