<?php

namespace App\Http\Controllers\Software\SuperAdmin\Website\Book;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Publisher;
use App\Model\Book;
use Image;

class BookCn extends Controller
{
    public function index()
    {
        $data['book']  = Book::with('publisher')->orderBy('id', 'desc')->get();
        return saView('pages.website.book.book.index', $data);
    }

    public function create(Request $request)
    {
        if ($request->type == 'save'){
            $data['action']     = 'save';
        } else {
            $data['action']     = 'edit';
            $data['value']      = Book::find($request->id);
        }

        $data['publisher']  = Publisher::where(['status' => 1])->get();
        return saView('pages.website.book.book.create', $data);
    }

    public function store(Request $request)
    {
        $data['publisher_id']       = $request->publisher_id;
        $data['name']               = $request->name;
        $data['title']              = $request->title;
        $data['heading']            = $request->heading;
        $data['writer']             = 'Istiaq Muhit';
        $data['name']               = $request->name;
        $data['description']        = $request->description;
        $data['meta_title']         = $request->meta_title;
        $data['meta_keywords']      = $request->meta_keywords;
        $data['meta_desc']          = $request->meta_desc;
        $data['meta_others']        = $request->meta_others;
        $data['trending']           = $request->trending;
        $data['status']             = $request->status;
        $id                         = $request->id;

        $files = ['image'];
        foreach ($files as $key => $file)
        {
            if($request->hasFile($file))
            {
                $doc = $request->file($file);
                $name = time()+($key+1).'.'.$doc->getClientOriginalExtension();
                $path = 'upload/book/';
                // Image::make($doc)->resize('150','150')->save($path.$name);
                Image::make($doc)->save($path.$name);
                $data[$file] = $name;
                if($id) dbClearFile('web_book', ['id' => $id], $path, [$file]);
            }
        }

        if(!$id)
        {
            $data['post_id']        = uniqNum();
            $data['created_by']     = saUser('id');
            $save                   = Book::create($data);
            msgFlash(CREATE);
        } else {
            $data['updated_by']     = saUser('id');
            $update                 = Book::whereId($id)->update($data);
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
        dbClearFile('web_book', ['id' => $request->id], 'upload/book/', ['image']);
        $delete = Book::destroy($request->id);
        msgFlash(DESTROY);

        return response()->json(['msg' => 'success']);
    }
}
