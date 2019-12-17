<?php

namespace App\Http\Controllers\Software\SuperAdmin\Catm;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\SubCategory;
use Image;

class SubCategoryCn extends Controller
{
    public function index()
    {
        $data['sub_categories']  = SubCategory::with('category')->orderBy('id', 'desc')->get();
        return saView('pages.catm.sub_category.index', $data);
    }

    public function create($id = null)
    {
        $data['categories']  = Category::where('status', 1)->get();
        if (!$id){
            $data['action']     = 'save';
        } else {
            $data['action']     = 'edit';
            $data['value']      = SubCategory::find($id);
        }

        return saView('pages.catm.sub_category.create', $data);
    }

    public function store(Request $request)
    {
        $data['cat_id']             = $request->cat_id;
        $data['sub_cat_name']       = $request->sub_cat_name;
        $data['status']             = $request->status;
        $id                         = $request->id;

        if(!$id)
        {
            $data['created_by']     = saUser('id');
            $save                   = SubCategory::create($data);
            msgFlash(CREATE);
        } else {
            $data['updated_by']     = saUser('id');
            $update                 = SubCategory::whereId($id)->update($data);
            msgFlash(UPDATE);
        }

        return saRedirect('sub.category.index');
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
        $update = SubCategory::whereId($request->id)->update(['deleted_by' => saUser('id')]);
        
        $delete = SubCategory::destroy($request->id);
        msgFlash(DESTROY);

        return response()->json(['msg' => 'success']);
    }
}