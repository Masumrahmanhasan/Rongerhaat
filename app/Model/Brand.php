<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model {
    
    use SoftDeletes;

    protected $table = 'brand';

    protected $fillable = [
        'br_name',
        'br_image',
        'status',
        'created_by'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'cat_id');
    }
}