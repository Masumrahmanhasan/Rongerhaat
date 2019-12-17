<?php

namespace App\Http\Controllers\Web\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\WebAuth;
use App\Model\Basic;

class LoginCn extends Controller
{
    public function index()
    {
        if (auth()->guard('web')->check()) {
            return redirect()->route('web.user.dashboard');
        }
        return view('web.pages.auth.login');
    }

    public function login(Request $request)
    {
        $username    = $request->username;
        $password    = $request->password;
        $goto        = ($request->goto) ? $request->goto : route('web.user.dashboard');

        if (auth()->guard('web')->attempt(['username' => $username, 'password' => $password, 'status' => 1])) {
            $log['online']          = 1;
            $log['login_at']        = \Carbon\Carbon::now();

            WebAuth::whereId(auth()->guard('web')->id())->update($log);
            return response()->json(['type' => 'success', 'msg' => 'Login Successfully', 'url' => $goto]);
        } else {
            return response()->json(['type' => 'error', 'msg' => 'These Credentials Do Not Match Our Records.']);
        }
    }
}