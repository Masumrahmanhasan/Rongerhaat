<?php

namespace App\Http\Controllers\Software\SuperAdmin\Brand;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Brand;
use Image;

class BrandCn extends Controller
{
    public function index()
    {
        $data['brand']  = Brand::orderBy('id', 'desc')->get();
        return saView('pages.brand.index', $data);
    }

    public function create($id = null)
    {
        if (!$id){
            $data['action']     = 'save';
        } else {
            $data['action']     = 'edit';
            $data['value']      = Brand::find($id);
        }

        return saView('pages.brand.create', $data);
    }

    public function store(Request $request)
    {
        $data['br_name']            = $request->br_name;
        $data['status']             = $request->status;
        $id                         = $request->id;

        $files = ['br_image'];
        foreach ($files as $key => $file)
        {
            if($request->hasFile($file))
            {
                $doc = $request->file($file);
                $name = time()+($key+1).'.'.$doc->getClientOriginalExtension();
                $path = 'upload/brand/';
                Image::make($doc)->save($path.$name);
                $data[$file] = $name;
                if($id) dbClearFile('brand', ['id' => $id], $path, [$file]);
            }
        }

        if(!$id)
        {
            $data['created_by']     = saUser('id');
            $save                   = Brand::create($data);
            msgFlash(CREATE);
        } else {
            $data['updated_by']     = saUser('id');
            $update                 = Brand::whereId($id)->update($data);
            msgFlash(UPDATE);
        }

        return saRedirect('brand.index');
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
        $update = Brand::whereId($request->id)->update(['deleted_by' => saUser('id')]);

        if(!isSoftDl('App\Model\Category')){
            dbClearFile('category', ['id' => $request->id], 'upload/category/', ['cat_image']);
        }
        
        $delete = Brand::destroy($request->id);
        msgFlash(DESTROY);

        return response()->json(['msg' => 'success']);
    }
}