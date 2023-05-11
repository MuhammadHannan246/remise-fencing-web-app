<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CustomerWalletHistory extends Model
{
    protected $fillable = [
        'customer_id',
        'transaction_amount',
        'transaction_type',
        'transaction_method',
        'transaction_id',
    ];
}
