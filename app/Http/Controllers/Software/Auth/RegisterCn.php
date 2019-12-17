<?php

namespace App\Http\Controllers\Software\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Model\SoftwareAuth;

class RegisterCn extends Controller
{
    public function store(Request $request)
    {
        $data['role']           = 'SuperAdmin';
        $data['name']           = 'Mehediul Hassan Miton';
        $data['email']          = 'mdmiton321@gmail.com';
        $data['phone']          = '01632651361';
        $data['username']       = 'admin';
        $data['password']       = Hash::make('admin');
        $data['status']         = 1;
        $data['created_by']     = 1;
        $data['created_at']     = \Carbon\Carbon::now();
        // SoftwareAuth::create($data);
        SoftwareAuth::updateOrCreate(['id' => 1], $data);

        // foreach ($users as $user) {
        //     echo $user->id;
        // }
    }
}