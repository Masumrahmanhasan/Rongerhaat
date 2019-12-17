<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model {
    
    // use SoftDeletes;

    protected $table = 'carts';

    protected $fillable = [
        'usr_id',
        'prod_id',
        'quantity',
        'price',
        'total_price',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'prod_id');
    }
}