<?php

namespace App\Http\Controllers\Software\SuperAdmin\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Slider;
use Image;

class SliderCn extends Controller
{
    public function index()
    {
        $data['slider']  = Slider::orderBy('id', 'desc')->get();
        return saView('pages.website.slider.index', $data);
    }

    public function create(Request $request)
    {
        if ($request->type == 'save'){
            $data['action']     = 'save';
        } else {
            $data['action']     = 'edit';
            $data['value']      = Slider::find($request->id);
        }

        return saView('pages.website.slider.create', $data);
    }

    public function store(Request $request)
    {
        $data['title']              = $request->title;
        $data['sub_title']          = $request->sub_title;
        $data['heading']            = $request->heading;
        $data['sub_heading']        = $request->sub_heading;
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
                $path = 'upload/slider/';
                // Image::make($doc)->resize('150','150')->save($path.$name);
                Image::make($doc)->save($path.$name);
                $data[$file] = $name;
                if($id) dbClearFile('web_slider', ['id' => $id], $path, [$file]);
            }
        }

        if(!$id)
        {
            $data['created_by']     = saUser('id');
            $save                   = Slider::create($data);
            msgFlash(CREATE);
        } else {
            $data['updated_by']     = saUser('id');
            $update                 = Slider::whereId($id)->update($data);
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
        dbClearFile('web_slider', ['id' => $request->id], 'upload/slider/', ['image']);
        $delete = Slider::destroy($request->id);
        msgFlash(DESTROY);

        return response()->json(['msg' => 'success']);
    }
}
