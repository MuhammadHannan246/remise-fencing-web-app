<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CustomerWallet extends Model
{
    protected $casts = [
        'created_at'    => 'datetime',
        'updated_at'    => 'datetime',
    ];
    protected $fillable = [
        'customer_id',
        'balance',
        'royality_points',
    ];
}
