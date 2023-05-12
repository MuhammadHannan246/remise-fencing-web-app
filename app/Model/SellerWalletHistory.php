<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SellerWalletHistory extends Model
{
    protected $fillable = [
        'seller_id',
        'amount',
        'order_id',
        'product_id',
        'payment',
    ];
    
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
