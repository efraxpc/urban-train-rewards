<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\PrizeCategory::class, function (Faker $faker) {
    return [
        'prize_category_name' => $faker->bs,
        'prize_category_image' => $faker->imageUrl(200, 200, 'cats'),
        'prize_category_description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
    ];
});

