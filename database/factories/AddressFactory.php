<?php

use Faker\Generator as Faker;
use App\Location;

$factory->define(App\Address::class, function (Faker $faker) {
    return [
      'street'=> $faker->streetName(),
      'number'=> $faker->buildingNumber(),
      'floor'=> $faker->randomDigitNotNull(),
      'location_id'=> Location::orderByRaw('RAND()')->first(),
      'latitude'=> $faker->latitude(-90, 90),
      'longitude'=> $faker->longitude(-180, 180),
    ];
});
