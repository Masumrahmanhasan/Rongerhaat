<?php

namespace App\Http\Controllers\Software\SuperAdmin\Catm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use Image;

class CategoryCn extends Controller
{
    public function index()
    {
        $data['categories']  = Category::orderBy('id', 'desc')->get();
        return saView('pages.catm.category.index', $data);
    }

    public function create($id = null)
    {
        if (!$id){
            $data['action']     = 'save';
        } else {
            $data['action']     = 'edit';
            $data['value']      = Category::find($id);
        }

        return saView('pages.catm.category.create', $data);
    }

    public function store(Request $request)
    {
        $data['cat_name']           = $request->cat_name;
        $data['status']             = $request->status;
        $id                         = $request->id;

        $files = ['cat_image'];
        foreach ($files as $key => $file)
        {
            if($request->hasFile($file))
            {
                $doc = $request->file($file);
                $name = time()+($key+1).'.'.$doc->getClientOriginalExtension();
                $path = 'upload/category/';
                Image::make($doc)->save($path.$name);
                $data[$file] = $name;
                if($id) dbClearFile('category', ['id' => $id], $path, [$file]);
            }
        }

        if(!$id)
        {
            $data['created_by']     = saUser('id');
            $save                   = Category::create($data);
            msgFlash(CREATE);
        } else {
            $data['updated_by']     = saUser('id');
            $update                 = Category::whereId($id)->update($data);
            msgFlash(UPDATE);
        }

        return saRedirect('category.index');
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
        $update = Category::whereId($request->id)->update(['deleted_by' => saUser('id')]);

        if(!isSoftDl('App\Model\Category')){
            dbClearFile('category', ['id' => $request->id], 'upload/category/', ['cat_image']);
        }
        
        $delete = Category::destroy($request->id);
        msgFlash(DESTROY);

        return response()->json(['msg' => 'success']);
    }
}
