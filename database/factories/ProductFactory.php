<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'company_id' => $faker->company(),
        'product_name' => $faker->word(),
        'price' => $faker->numberBetween(100,200),
        'stock' => $faker->numberBetween(10,20),
        'comment' => $faker->realText(100),
        'img_path' => $faker->imageUrl()
    ];
});
