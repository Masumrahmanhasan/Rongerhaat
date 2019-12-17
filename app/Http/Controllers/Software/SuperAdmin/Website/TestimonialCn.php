<?php

namespace App\Http\Controllers\Software\SuperAdmin\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Testimonial;
use Image;

class TestimonialCn extends Controller
{
    public function index()
    {
        $data['testimonial']  = Testimonial::orderBy('id', 'desc')->get();
        return saView('pages.website.testimonial.index', $data);
    }

    public function create(Request $request)
    {
        if ($request->type == 'save'){
            $data['action']     = 'save';
        } else {
            $data['action']     = 'edit';
            $data['value']      = Testimonial::find($request->id);
        }

        return saView('pages.website.testimonial.create', $data);
    }

    public function store(Request $request)
    {
        $data['name']               = $request->name;
        $data['designation']        = $request->designation;
        $data['description']        = $request->description;
        $data['status']             = $request->status;
        $id                         = $request->id;

        $files = ['image'];
        foreach ($files as $key => $file)
        {
            if($request->hasFile($file))
            {
                $doc = $request->file($file);
                $name = time()+($key+1).'.'.$doc->getClientOriginalExtension();
                $path = 'upload/testimonial/';
                // Image::make($doc)->resize('150','150')->save($path.$name);
                Image::make($doc)->save($path.$name);
                $data[$file] = $name;
                if($id) dbClearFile('web_testimonial', ['id' => $id], $path, [$file]);
            }
        }

        if(!$id)
        {
            $data['created_by']     = saUser('id');
            $save                   = Testimonial::create($data);
            msgFlash(CREATE);
        } else {
            $data['updated_by']     = saUser('id');
            $update                 = Testimonial::whereId($id)->update($data);
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
        dbClearFile('web_testimonial', ['id' => $request->id], 'upload/testimonial/', ['image']);
        $delete = Testimonial::destroy($request->id);
        msgFlash(DESTROY);

        return response()->json(['msg' => 'success']);
    }
}
