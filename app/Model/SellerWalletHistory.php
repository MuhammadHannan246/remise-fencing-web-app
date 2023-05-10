<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SellerWalletHistory extends Model
{
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

}
