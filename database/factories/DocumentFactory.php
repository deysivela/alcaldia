<?php

use Faker\Generator as Faker;

$factory->define(App\Document::class, function (Faker $faker) {
    return [
    	'user_id' => rand(1,5),
        'categorie_id' => rand(1,7),
        'cod' => $faker->sentence,
        'name' => $faker->sentence,
        'description' => $faker->sentence,
        'date_creation' => $faker->dateTimeThisMonth()->format('Y-m-d H:i:s'),
        'file' => $faker->imageUrl($width = 1200, $height = 400),
    ];
});
