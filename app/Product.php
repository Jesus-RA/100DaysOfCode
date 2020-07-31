<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
