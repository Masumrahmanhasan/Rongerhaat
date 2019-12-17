<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class SoftwareAuth extends Authenticatable
{
    protected $table        = 'software_users';
    // protected $primaryKey   ='id';

    protected $fillable = [
        'role',
        'name',
        'email',
        'phone',
        'username',
        'password',
        'status',
        'created_at',
        'created_by'
    ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];
}
