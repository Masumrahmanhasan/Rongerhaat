<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;

class SearchController extends Controller
{
    public function search(Request $request)
    {
    	$query = $request->get('query', '');
    	$data = Product::where('name', 'Like','%'.$query.'%')->get();
    	return response()->json($data);
    }
}
