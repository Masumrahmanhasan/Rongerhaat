<?php

namespace App\Http\Controllers\Web\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\WebAuth;
use Image;

class AddressBookCn extends Controller
{
    public function index()
    {
        $data['user']  = WebAuth::where('id', webUser('id'))->first();
        return webView('pages.user.address_book.index', $data);
    }

    public function create($id = null)
    {
        $data['user']  = WebAuth::where('id', webUser('id'))->first();
        return webView('pages.user.address_book.create', $data);
    }

    public function store(Request $request)
    {
        $sData['s_name']            = $request->s_name;
        $sData['s_address']         = $request->s_address;
        $sData['s_country']         = $request->s_country;
        $sData['s_city']            = $request->s_city;
        $sData['s_state']           = $request->s_state;
        $sData['s_zip']             = $request->s_zip;
        $sData['s_phone']           = $request->s_phone;

        $bData['b_name']            = $request->b_name;
        $bData['b_address']         = $request->b_address;
        $bData['b_country']         = $request->b_country;
        $bData['b_city']            = $request->b_city;
        $bData['b_state']           = $request->b_state;
        $bData['b_zip']             = $request->b_zip;
        $bData['b_phone']           = $request->b_phone;

        $data['shipping_address']   = json_encode($sData);
        $data['billing_address']    = json_encode($bData);
        $id                         = webUser('id');


        $update = WebAuth::whereId($id)->update($data);

        session()->flash('msg', ['text' => 'Data Update Successfull', 'type' => 'success']);
        // return redirect()->route('web.user.address.book.index');
        return redirect()->back();
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

    }

    public function destroy(Request $request)
    {
    }
}