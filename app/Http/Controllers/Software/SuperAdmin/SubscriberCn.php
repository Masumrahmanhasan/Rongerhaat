<?php

namespace App\Http\Controllers\Software\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Subscribe;

class SubscriberCn extends Controller
{
    public function index()
    {
        $data['subscriber']  = Subscribe::orderBy('id', 'desc')->get();
        return saView('pages.subscriber.index', $data);
    }

    public function create(Request $request)
    {
        if ($request->type == 'save'){
            $data['action']     = 'save';
        } else {
            $data['action']     = 'edit';
            $data['value']      = Subscribe::find($request->id);
        }

        return saView('pages.subscriber.create', $data);
    }

    public function store(Request $request)
    {
        $data['email']              = strip_tags($request->email);
        $data['status']             = strip_tags($request->status);
        $id                         = $request->id;

        if(!$id)
        {
            $save                   = Subscribe::create($data);
            msgFlash(CREATE);
        } else {
            $update                 = Subscribe::whereId($id)->update($data);
            msgFlash(UPDATE);
        }

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

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(Request $request)
    {
        $delete = Subscribe::destroy($request->id);
        msgFlash(DESTROY);
        return response()->json(['msg' => 'success']);
    }
}