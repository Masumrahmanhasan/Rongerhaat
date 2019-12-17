<?php

namespace App\Http\Controllers\Web\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Cart;
use App\Model\Product;

class CartCn extends Controller
{
    public function index()
    {
        $data['carts']  = Cart::with('product')->where('usr_id', webUser('id'))->orderBy('id', 'desc')->get();
        return webView('pages.user.cart.list', $data);
    }

    public function create($id = null)
    {
        $data['categories']  = Category::where('status', 1)->get();
        if (!$id){
            $data['action']     = 'save';
        } else {
            $data['action']     = 'edit';
            $data['value']      = Cart::find($id);
        }

        return saView('pages.catm.sub_category.create', $data);
    }

    public function store(Request $request)
    {
        $data['usr_id']             = webUser('id');
        $data['prod_id']            = $request->prod_id;
        $data['quantity']           = ($request->quantity) ? $request->quantity : 1;
        $data['price']              = $request->price;
        $data['total_price']        = $data['quantity'] * $request->price;
        $data['status']             = 'New';
        $id                         = $request->id;

        $total = Cart::where(['usr_id' => webUser('id')])->count();
        $check = Cart::where(['usr_id' => webUser('id'), 'prod_id' => $request->prod_id])->first();

        
        if($check){
            $qn = $data['quantity'];
            $update = Cart::whereId($check->id)->update(['quantity' => $qn]);
            
            $cartDropDown = view('web.pages.user.cart.dropdown')->render();
            return response()->json(['msg' => 'exists', 'cartDropDown' => $cartDropDown]);
        }


        $save = Cart::create($data);

        $cartDropDown = view('web.pages.user.cart.dropdown')->render();
        return response()->json(['msg' => 'added', 'cartDropDown' => $cartDropDown]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request)
    {   
        $data = Cart::where(['id' => $request->cart_id])->first();
        $update = Cart::whereId($request->cart_id)->update(['quantity' => $request->quantity, 'total_price' => $request->quantity*$data->price]);

        $viewCart = view('web.pages.user.cart.ajax_list')->render();
        $cartDropDown   = view('web.pages.user.cart.dropdown')->render();
        return response()->json(['msg' => 'updated', 'cartDropDown' => $cartDropDown, 'viewCart' => $viewCart]);
    }

    public function destroy(Request $request)
    {
        $delete = Cart::destroy($request->cart_id);
        
        $viewCart       = view('web.pages.user.cart.ajax_list')->render();
        $cartDropDown   = view('web.pages.user.cart.dropdown')->render();

        return response()->json(['msg' => 'success', 'page' => $request->page, 'cartDropDown' => $cartDropDown, 'viewCart' => $viewCart]);
    }
}