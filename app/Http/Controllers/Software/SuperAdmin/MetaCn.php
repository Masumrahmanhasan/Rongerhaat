<?php

namespace App\Http\Controllers\Software\SuperAdmin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Blog;
use App\Model\Book;
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
        $data['blog']  = Blog::orderBy('id', 'ASC')->get();
        $data['book']  = Book::orderBy('id', 'ASC')->get();
        $data['meta']  = SeoMeta::orderBy('id', 'desc')->get();

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
        $data['keywords']           = $request->keywords;
        $data['description']        = $request->description;
        $data['others']             = $request->others;
        $data['status']             = $request->status;
        $id                         = $request->id;

        if(!$id)
        {
            $data['page_key']           = $request->page_key;
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
        $delete = SeoMeta::destroy($request->id);
        msgFlash(DESTROY);

        return response()->json(['msg' => 'success']);
    }
}