<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cart;
use App\Order;
use App\Image;

class Product extends Model
{
    // Indica los atributos que son asignados de forma masiva.
    protected $fillable = [
        'title',
        'description',
        'price',
        'stock',
        'status',
    ];

    public function carts(){
        return $this->belongsToMany(Cart::class)->withPivot('quantity');
    }

    public function orders(){
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }

    public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }
}