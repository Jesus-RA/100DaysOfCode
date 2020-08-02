<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

class Payment extends Model
{
    protected $fillable = [
        'amount',
        'payed_at',
        'order_id'
    ];

    protected $dates = [
        'payed_at',
    ];

    public function order(){
        return $this->belongsTo(Order::class);
    }
}
