<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Offer::class, function (Faker $faker) {
    return [
        'offer_name' => $faker->bs,
        'offer_short_description' => $faker->paragraph($nbSentences = 1, $variableNbSentences = true),
        'offer_long_description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'offer_link' => $faker->url,
        'offer_worth' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        'country_id' => rand( 1 , 3 ),
        'offer_image' => $faker->imageUrl(200, 200, 'cats'),
        'offer_network' => $faker->domainName, 
        'prize_category_id' => rand( 1 , 30 )
    ];
});

