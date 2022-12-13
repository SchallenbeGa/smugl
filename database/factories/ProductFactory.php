<?php

use Faker\Generator as Faker;

$factory->define(\App\Product::class, function (Faker $faker) {
    return [
        'name' => str_random(8),
        'description' => str_random(40),
        'price'=> $faker->numberBetween(3,5),
        'category_id' => '1',
        'user_id' => '1',
    ];
});
