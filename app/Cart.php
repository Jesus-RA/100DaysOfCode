<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Cart extends Model
{
    public function products(){
        // Relation many to many
        // return $this->belongsToMany(Product::class)->withPivot('quantity');
        // Polymorphic relation many to many
        return $this->morphToMany(Product::class, 'productable')->withPivot('quantity');
    }
}
