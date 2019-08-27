<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'client_id',
        'title',
        'content'
    ];

    public function order() {
        return $this->hasOne(Order::class);
    }
}
