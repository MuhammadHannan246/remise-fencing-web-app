<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CustomerWallet extends Model
{
    protected $fillable = [
        'customer_id',
        'balance',
        'royality_points',
    ];
}
