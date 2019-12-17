<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model {
    
    use SoftDeletes;

    protected $table = 'orders';

    protected $fillable = [
        'inv_id',
        'usr_id',
        'prod_id',
        'quantity',
        'price',
        'sub_price',
        'prod_data',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'prod_id');
    }
}