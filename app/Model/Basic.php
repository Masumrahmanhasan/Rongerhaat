<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Basic extends Model
{
    use SoftDeletes;
    
    protected $table = 'basic_info';

    protected $fillable = [
        'title',
        'name',
        'phone',
        'email',
        'address',
        'logo',
        'footer_logo',
        'copy_name',
        'copy_link',
        'copy_year',
        'footer_desc',
        // 'video',
        'created_by',
    ];
}
