<?php

use Faker\Generator as Faker;

$factory->define(App\MedicalServiceType::class, function (Faker $faker) {
    return [
      'name'=> $faker->name(),
      'is_transport_service'=> $faker->boolean(),
    ];
});
