<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'web_slider';

    protected $fillable = [
        'title',
        'sub_title',
        'heading',
        'sub_heading',
        'image',
        'description',
        'status',
        'created_by'
    ];
}
