<?php

namespace App\Http\Controllers\Web\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\WebAuth;
use Image;

class ProfileCn extends Controller
{
    public function index()
    {
        $data['user']  = WebAuth::where('id', webUser('id'))->first();
        return webView('pages.user.profile.index', $data);
    }

    public function create($id = null)
    {
        $data['user']  = WebAuth::where('id', webUser('id'))->first();
        return webView('pages.user.profile.create', $data);
    }

    public function store(Request $request)
    {
        $data['name']            = $request->name;
        $data['birth_date']      = $request->birth_date;
        $data['gender']          = $request->gender;
        $id                         = webUser('id');

        $files = ['image'];
        foreach ($files as $key => $file)
        {
            if($request->hasFile($file))
            {
                $doc = $request->file($file);
                $name = time()+($key+1).'.'.$doc->getClientOriginalExtension();
                $path = 'upload/user/';
                Image::make($doc)->resize(250, 250)->save($path.$name);
                $data[$file] = $name;
                if($id) dbClearFile('web_users', ['id' => $id], $path, [$file]);
            }
        }

        $update = WebAuth::whereId($id)->update($data);

        session()->flash('msg', ['text' => 'Profile Update Successfull', 'type' => 'success']);
        return redirect()->route('web.user.profile.index');
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