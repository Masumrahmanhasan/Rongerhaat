<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = 'web_testimonial';

    protected $fillable = [
        'name',
        'designation',
        'image',
        'description',
        'status',
        'created_by'
    ];
}
