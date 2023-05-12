<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminWalletHistory extends Model
{
    protected $fillable = [
        'admin_id',
        'amount',
        'order_id',
        'product_id',
        'payment',
        'payment_type',
    ];
    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
