<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'path',
    ];

    // Retornará el tipo y id correspondiente
    public function imageable(){
        return $this->morphTo();
    }
}
