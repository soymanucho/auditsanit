<?php

use Faker\Generator as Faker;

$factory->define(App\ServiceType::class, function (Faker $faker) {
    return [
      'name'=> $faker->sentence($nbWords = 2, $variableNbWords = true),
      'is_transport_service'=> $faker->boolean(),
    ];
});
