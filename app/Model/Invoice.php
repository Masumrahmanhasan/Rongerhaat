<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model {
    
    // use SoftDeletes;

    protected $table = 'invoice';

    protected $fillable = [
        'inv_no',
        'usr_id',
        'prod_ids',
        'quantity',
        'sub_price',
        'discount',
        'total_price',
        'shipping_address',
        'billing_address',
        'pay_type',
        'pay_id',
        'pay_status',
        'status',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class, 'inv_id');
    }

    public function user()
    {
        return $this->belongsTo(WebAuth::class, 'usr_id');
    }
}