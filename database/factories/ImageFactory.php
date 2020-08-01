<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    $img = $faker->numberBetween(1, 10) . '.jpg';
    return [
        'path' => public_path("img/products/{$img}"),
    ];
});

$factory->state(Image::class, 'user', function($faker){
    $img = $faker->numberBetween(1, 6) . '.jpg';
    return [
        'path' => public_path("img/users/{$img}")
    ];
});