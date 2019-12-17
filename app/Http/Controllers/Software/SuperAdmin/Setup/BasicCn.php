<?php

namespace App\Http\Controllers\Software\SuperAdmin\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Basic;
use Image;

class BasicCn extends Controller
{
    public function index()
    {
        $data['basic']  = Basic::orderBy('id', 'desc')->get();
        return saView('pages.setup.basic.index', $data);
    }

    public function create($id = null)
    {
        if (!$id){
            $data['action']     = 'save';
        } else {
            $data['action']     = 'edit';
            $data['value']      = Basic::find($id);
        }

        return saView('pages.setup.basic.create', $data);
    }

    public function store(Request $request)
    {
        $data['title']              = $request->title;
        $data['name']               = $request->name;
        $data['phone']              = $request->phone;
        $data['email']              = $request->email;
        $data['address']            = $request->address;
        $data['copy_name']          = $request->copy_name;
        $data['copy_link']          = $request->copy_link;
        $data['copy_year']          = $request->copy_year;
        $data['footer_desc']        = $request->footer_desc;
        // $data['video']              = $request->video;
        $id                         = $request->id;

        $files = ['logo'];
        foreach ($files as $key => $file)
        {
            if($request->hasFile($file))
            {
                $doc = $request->file($file);
                $name = time()+($key+1).'.'.$doc->getClientOriginalExtension();
                $path = 'upload/basic/';
                Image::make($doc)->save($path.$name);
                $data[$file] = $name;
                if($id) dbClearFile('basic_info', ['id' => $id], $path, [$file]);
            }
        }

        if(!$id)
        {
            $data['created_by']     = saUser('id');
            $save                   = Basic::create($data);
            msgFlash(CREATE);
        } else {
            $data['updated_by']     = saUser('id');
            $update                 = Basic::whereId($id)->update($data);
            msgFlash(UPDATE);
        }

        session()->put('basic', Basic::find(1));
        return saRedirect('basic.index');
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
        $update = Basic::whereId($request->id)->update(['deleted_by' => saUser('id')]);
        
        if(!isSoftDl('App\Model\Basic')){
            dbClearFile('basic_info', ['id' => $request->id], 'upload/basic/', ['logo']);
        }

        $delete = Basic::destroy($request->id);
        msgFlash(DESTROY);

        return response()->json(['msg' => 'success']);
    }
}
