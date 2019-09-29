<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Reward::class, function (Faker $faker) {
    return [
        'reward_name' => $faker->bs,
        'reward_description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'reward_image' => 'tauro.jpg',
        'reward_worth' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        'reward_type_id' => rand( 1 , 3 ),
        'offer_id' => $faker->unique()->numberBetween($min = 1, $max = 100)
    ];
});

