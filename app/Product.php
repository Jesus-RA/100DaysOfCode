<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\AvailableScope;
use App\Cart;
use App\Order;
use App\Image;

class Product extends Model
{

    protected $table = 'products';

    // In $with we especify what relations we want when we do an all() query
    protected $with = [
        'images',
    ];

    // Indica los atributos que son asignados de forma masiva.
    protected $fillable = [
        'title',
        'description',
        'price',
        'stock',
        'status',
    ];

    /**
     * The "booted" method of the model.
     *  Call here the global scope
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope(new AvailableScope);
    }

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