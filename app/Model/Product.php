<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model {
	
    use SoftDeletes;
    
    protected $table = 'products';

     protected $fillable = [
        'post_id',
        'cat_id',
        'sub_cat_id',
        'brand_id',
        'name',
        'description',
        'price',
        'discount',
        'status',
        'created_by'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_cat_id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function productImg()
    {
        return $this->hasMany(ProductImage::class, 'prod_id');
    }
}