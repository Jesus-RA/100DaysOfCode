<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'amount',
        'payed_at'
    ];

    protected $dates = ['payed_at'];
}
