<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Cart;

class HomeCn extends Controller
{
    function __construct()
    {
        // $data['social'] = Social::where(['status' => 1])->get();
        // session()->put('basic', Basic::find(1));
        // view()->share($data);
    }

    public function index()
    {
        $data['categories'] = Category::with('products')->orderBy('id', 'asc')->get();
        return webView('pages.home', $data);
    }
}