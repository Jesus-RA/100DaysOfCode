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
        // Relation many to many
        // return $this->belongsToMany(Cart::class)->withPivot('quantity');
        // Polymorphic relation many to many        
        return $this->morphedByMany(Cart::class, 'productable')->withPivot('quantity');
    }

    public function orders(){
        // Relation many to many
        // return $this->belongsToMany(Order::class)->withPivot('quantity');
        // Polymorphic relation many to many
        return $this->morphedByMany(Order::class, 'productable')->withPivot('quantity');
    }

    public function images(){
        return $this->morphMany(Image::class, 'imageable');
    }

    // Creating a local scope
    public function scopeAvailable($query){
        $query->where('status', 'available');
    }

    // Computed Attributes - Accessors 
    public function getTotalAttribute(){
        return $this->pivot->quantity * $this->price;
    }
}