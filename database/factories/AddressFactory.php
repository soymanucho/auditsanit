<?php

use Faker\Generator as Faker;
use App\Location;

$factory->define(App\Address::class, function (Faker $faker) {
    return [
      'street'=>$faker->streetName(),
      'number'=>$faker->buildingNumber(),
      'floor'=>$faker->randomDigitNotNull(),
      'location_id'=> Location::orderByRaw('RAND()')->first(),
      'latitude'=>$faker->latitude($min = -90, $max = 90),
      'longitude'=>$faker->longitude($min = -180, $max = 180)
    ];
});
