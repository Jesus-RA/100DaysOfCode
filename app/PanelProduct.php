<?php

namespace App;

use App\Product;

class PanelProduct extends Product
{
        /**
     * The "booted" method of the model.
     *  Call here the global scope
     * @return void
     */
    protected static function booted()
    {
        // We have to remove the Global Scope here to can use the admin methods
        // without the Global Scope
    }
}