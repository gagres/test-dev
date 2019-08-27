<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $fillable = ['id', 'client_id', 'ticket_id'];

    public function ticket() {
        return $this->belongsTo(Ticket::class);
    }

    public function client() {
        return $this->belongsTo(Client::class);
    }
}
