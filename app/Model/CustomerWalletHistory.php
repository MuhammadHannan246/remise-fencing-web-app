<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CustomerWalletHistory extends Model
{
    protected $casts = [
        'created_at'    => 'datetime',
        'updated_at'    => 'datetime',
    ];

    protected $fillable = [
        'customer_id',
        'transaction_amount',
        'transaction_type',
        'transaction_method',
        'transaction_id',
    ];
}
