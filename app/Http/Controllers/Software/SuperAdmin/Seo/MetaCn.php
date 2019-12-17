<?php

namespace App\Http\Controllers\Software\SuperAdmin\Seo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\SeoMeta;

class MetaCn extends Controller
{
    public function index()
    {
        $data['meta']  = SeoMeta::orderBy('id', 'desc')->get();
        return saView('pages.seo.meta.index', $data);
    }

    public function create(Request $request)
    {
        if ($request->type == 'save'){
            $data['action']     = 'save';
        } else {
            $data['action']     = 'edit';
            $data['value']      = SeoMeta::find($request->id);
        }

        return saView('pages.seo.meta.create', $data);
    }

    public function store(Request $request)
    {
        $data['title']              = $request->title;
        $data['heading']            = $request->heading;
        $data['description']        = $request->description;
        $data['status']             = 1;
        $id                         = $request->id;

        $files = ['image'];
        foreach ($files as $key => $file)
        {
            if($request->hasFile($file))
            {
                $doc = $request->file($file);
                $name = time()+($key+1).'.'.$doc->getClientOriginalExtension();
                $path = 'upload/about/';
                // Image::make($doc)->resize('150','150')->save($path.$name);
                Image::make($doc)->save($path.$name);
                $data[$file] = $name;
                if($id) dbClearFile('web_about', ['id' => $id], $path, [$file]);
            }
        }

        if(!$id)
        {
            $data['created_by']     = saUser('id');
            $save                   = SeoMeta::create($data);
            msgFlash(CREATE);
        } else {
            $data['updated_by']     = saUser('id');
            $update                 = SeoMeta::whereId($id)->update($data);
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
        dbClearFile('web_about', ['id' => $request->id], 'upload/about/', ['image']);
        $delete = SeoMeta::destroy($request->id);
        msgFlash(DESTROY);

        return response()->json(['msg' => 'success']);
    }
}