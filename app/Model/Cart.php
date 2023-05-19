<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    protected $casts = [
        'price' => 'float',
        'discount' => 'float',
        'tax' => 'float',
        'seller_id' => 'integer',
        'quantity' => 'integer',
        'shipping_cost'=>'float',
        'delivery_date'=>'string'
    ];

    protected $fillable = [
        'shipping_cost',
        'delivery_date',
        'shipping_type',
    ];

    public function cart_shipping()
    {
        return $this->hasOne(CartShipping::class,'cart_group_id','cart_group_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class)->where('status', 1);
    }
    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
    public function shop()
    {
        return $this->belongsTo(Shop::class,'seller_id','seller_id');
    }


}
