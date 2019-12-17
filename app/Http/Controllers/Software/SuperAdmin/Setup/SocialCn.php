<?php

namespace App\Http\Controllers\Software\SuperAdmin\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Social;

class SocialCn extends Controller
{
    public function index()
    {
        $data['social']  = Social::with('createdAuthor', 'updatedAuthor')->orderBy('id', 'desc')->get();
        return saView('pages.setup.social.index', $data);
    }

    public function create($id = null)
    {
        if (!$id){
            $data['action']     = 'save';
        } else {
            $data['action']     = 'edit';
            $data['value']      = Social::find($id);
        }

        return saView('pages.setup.social.create', $data);
    }

    public function store(Request $request)
    {
        $data['icon']               = strip_tags($request->icon);
        $data['url']                = strip_tags($request->url);
        $data['status']             = strip_tags($request->status);
        $id                         = $request->id;

        if(!$id)
        {
            $data['created_by']     = saUser('id');
            $save                   = Social::create($data);
            msgFlash(CREATE);
        } else {
            $data['updated_by']     = saUser('id');
            $update                 = Social::whereId($id)->update($data);
            msgFlash(UPDATE);
        }

        return saRedirect('social.index');        
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
        $update = Social::whereId($request->id)->update(['deleted_by' => saUser('id')]);
        
        $delete = Social::destroy($request->id);
        msgFlash(DESTROY);

        return response()->json(['msg' => 'success']);
    }
}