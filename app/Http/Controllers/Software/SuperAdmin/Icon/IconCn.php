<?php

namespace App\Http\Controllers\Software\SuperAdmin\Icon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IconCn extends Controller
{
    public function index()
    {
        return saView('pages.icon.index');
    }
}
