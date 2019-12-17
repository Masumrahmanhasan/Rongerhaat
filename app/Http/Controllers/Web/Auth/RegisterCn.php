<?php

namespace App\Http\Controllers\Web\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Model\WebAuth;

class RegisterCn extends Controller
{
    public function index()
    {
        return view('web.pages.auth.register');
    }

    public function store(Request $request)
    {
        // $validatedData = $request->validate([
        //     'phone'    => 'required|unique:web_users',
        //     'email'    => 'required|unique:web_users',
        //     'username' => 'required|unique:web_users',
        //     'password' => 'required',
        // ]);

        $data['access_code']            = uniqNum();
        $data['role']                   = 'General';
        $data['name']                   = $request->name;
        $data['phone']                  = $request->phone;
        $data['email']                  = $request->email;
        $data['username']               = $request->username;
        $data['password']               = Hash::make($request->password);
        $data['verify_token']           = $request->username.'-'.generateToken();
        $data['created_by']             = 0;
        
        $check = WebAuth::where('phone', $request->phone)->orWhere('email', $request->email)->orWhere('username', $request->username)->first();
        if($check)
        {
            return response()->json(['data' => $check, 'type'=>'error']);
        }

        $url                = webRoute('user.auth.email.verification', [$data['verify_token']]);
        $mail['email']      = $data['email'];
        $mail['sub']        = 'Account Verification - '.$request->username;
        $mail['data']       = (object) ['url' => $url, 'user' => $request->username];

        $message = view('email.verify', $mail)->render();
        // $send = sendEmail($mail['email'], $mail['sub'], '123');
        $cUrl = 'http://mhmiton.com/api/phpMailer/mail.php';
        $fields = [
            'to'       => $mail['email'],
            'sub'      => $mail['sub'],
            'msg'      => $message,
            'from'     => 'RongerHaat'
        ];

        $fields_string = http_build_query($fields);
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $cUrl);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
        $result = curl_exec($ch);

        WebAuth::create($data);

        return response()->json(['type'=>'success', 'msg'=>'Sign Up Successfull. Please Email Verification Now...']);
    }
}