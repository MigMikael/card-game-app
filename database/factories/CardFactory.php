<?php

use Faker\Generator as Faker;

$factory->define(\App\Card::class, function (Faker $faker) {
    return [
        'value' => $faker->numberBetween(0, 30),
        'color' => $faker->hexColor
    ];
});
