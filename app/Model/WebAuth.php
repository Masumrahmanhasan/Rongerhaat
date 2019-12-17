<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class WebAuth extends Authenticatable
{
    protected $table        = 'web_users';
    // protected $primaryKey   ='id';

    protected $fillable = [
        'access_code',
        'role',
        'name',
        'email',
        'phone',
        'username',
        'password',
        'verify_token',
        'status',
        'created_by'
    ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];
}
