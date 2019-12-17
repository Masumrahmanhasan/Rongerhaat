<?php

namespace App\Http\Controllers\Web\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\WebAuth;

class DashboardCn extends Controller
{
    public function index()
    {
        $data['user']  = WebAuth::where('id', webUser('id'))->first();
        return webView('pages.user.dashboard', $data);
    }
}