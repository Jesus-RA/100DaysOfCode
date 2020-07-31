<?php

use App\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Usando el comando php artisan migrate:fresh --seed creamos las instancias en la bd.
        $products = factory(Product::class, 50)->create();
        // $this->call(UserSeeder::class);
    }
}
