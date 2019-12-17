<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model {
    
    use SoftDeletes;

	protected $table = 'category';

    protected $fillable = [
        'cat_name',
        'cat_image',
        'status',
        'created_by'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'cat_id');
    }
}
