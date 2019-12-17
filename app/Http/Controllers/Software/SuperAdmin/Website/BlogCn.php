<?php

namespace App\Http\Controllers\Software\SuperAdmin\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Blog;
use Image;

class BlogCn extends Controller
{
    public function index()
    {
        $data['blog']  = Blog::orderBy('id', 'desc')->get();
        return saView('pages.website.blog.index', $data);
    }

    public function create(Request $request)
    {
        if ($request->type == 'save'){
            $data['action']     = 'save';
        } else {
            $data['action']     = 'edit';
            $data['value']      = Blog::find($request->id);
        }

        return saView('pages.website.blog.create', $data);
    }

    public function store(Request $request)
    {
        $data['title']              = $request->title;
        $data['description']        = $request->description;
        $data['meta_title']         = $request->meta_title;
        $data['meta_keywords']      = $request->meta_keywords;
        $data['meta_desc']          = $request->meta_desc;
        $data['meta_others']        = $request->meta_others;
        $data['status']             = $request->status;
        $id                         = $request->id;

        $files = ['image'];
        foreach ($files as $key => $file)
        {
            if($request->hasFile($file))
            {
                $doc = $request->file($file);
                $name = time()+($key+1).'.'.$doc->getClientOriginalExtension();
                $path = 'upload/blog/';
                // Image::make($doc)->resize('150','150')->save($path.$name);
                Image::make($doc)->save($path.$name);
                $data[$file] = $name;
                if($id) dbClearFile('web_blog', ['id' => $id], $path, [$file]);
            }
        }

        if(!$id)
        {
            $data['post_id']        = uniqNum();
            $data['created_by']     = saUser('id');
            $save                   = Blog::create($data);
            msgFlash(CREATE);
        } else {
            $data['updated_by']     = saUser('id');
            $update                 = Blog::whereId($id)->update($data);
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
        dbClearFile('web_blog', ['id' => $request->id], 'upload/blog/', ['image']);
        $delete = Blog::destroy($request->id);
        msgFlash(DESTROY);

        return response()->json(['msg' => 'success']);
    }
}
