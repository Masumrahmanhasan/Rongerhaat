<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model {
    use SoftDeletes;

    protected $table = 'sub_category';

    protected $fillable = [
        'cat_id',
        'sub_cat_name',
        'status',
        'created_by'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
}
