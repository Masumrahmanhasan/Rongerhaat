<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;

class ProductCn extends Controller
{
    public function details($param)
    {
        $post_id            = explode('-', $param);
        $data['product']    = Product::with('productImg')->where('post_id', end($post_id))->firstOrFail();
        $data['products']   = Product::with('productImg')->orderBy('id', 'desc')->get();
        return webView('pages.product.details', $data);
    }
}