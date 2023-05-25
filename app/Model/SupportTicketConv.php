<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SupportTicketConv extends Model
{
    protected $casts = [
        'support_ticket_id' => 'integer',
        'admin_id' => 'integer',
        'position' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $fillable = [
        'admin_message',
        'admin_id',
        'support_ticket_id',
        'created_at',
        'updated_at'
    ];

    public function support()
    {
        return $this->belongsTo(SupportTicket::class,'support_ticket_id','id');
    }
}