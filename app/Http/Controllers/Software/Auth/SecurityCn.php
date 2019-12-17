<?php

namespace App\Http\Controllers\Software\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Model\SoftwareAuth;

class SecurityCn extends Controller
{
    public function changePassword(Request $request)
    {
        $id             = saUser('id');
        $old_pass       = $request->old_pass;
        $new_pass       = Hash::make($request->new_pass);

        $data = SoftwareAuth::find($id);

        if(Hash::check($old_pass, $data->password))
        {
            SoftwareAuth::whereId($id)->update(['password' => $new_pass]);
            return '1';
        } else {
            return '0';
        }
    }
}