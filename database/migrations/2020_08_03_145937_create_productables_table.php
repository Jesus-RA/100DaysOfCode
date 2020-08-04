<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {    
        Schema::create('productables', function (Blueprint $table) {
            $table->bigInteger('product_id')->unsigned();
            $table->integer('quantity')->unsigned();
            // This polymorphic relation many to many for Product-Cart and Product-Order
            //  avoid us to create two migrations for every single one
            $table->morphs('productable');

            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productables');
    }
}
