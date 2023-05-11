<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdminWalletHistory extends Model
{
    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
