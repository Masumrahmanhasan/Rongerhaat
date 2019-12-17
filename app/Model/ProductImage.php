<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model {
    
    protected $table = 'product_image';

     protected $fillable = [
        'prod_id',
        'image',
        'thumb',
    ];
}