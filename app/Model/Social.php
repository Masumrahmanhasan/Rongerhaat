<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Social extends Model
{
    use SoftDeletes;
    
    protected $table = 'social';

    protected $fillable = [
        'icon',
        'url',
        'status',
        'created_by',
    ];

    public function createdAuthor()
    {
        return $this->belongsTo(SoftwareAuth::class, 'created_by');
    }

    public function updatedAuthor()
    {
        return $this->belongsTo(SoftwareAuth::class, 'updated_by');
    }
}