<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'client_id',
        'order_number',
        'title',
        'content'
    ];

    public function client() {
        return $this->belongsTo(Client::class);
    }
}
