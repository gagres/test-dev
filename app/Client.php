<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name',
        'email'
    ];

    public function tickets() {
        return $this->hasMany(Ticket::model);
    }
}
