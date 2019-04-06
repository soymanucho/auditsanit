<?php

use Faker\Generator as Faker;
use App\Location;

$factory->define(App\Address::class, function (Faker $faker) {
    return [
      'street'=> $faker->streetName(),
      'number'=> $faker->buildingNumber(),
      'floor'=> $faker->randomDigitNotNull(),
      'location_id'=> Location::orderByRaw('RAND()')->first(),
<<<<<<< HEAD
      'latitude'=>$faker->latitude($min = -90, $max = 90),
      'longitude'=>$faker->longitude($min = -180, $max = 180)
=======
      'latitude'=> $faker->latitude(-90, 90),
      'longitude'=> $faker->longitude(-180, 180),
>>>>>>> 4ee63da2575da7107de97064af03ff159dc4854b
    ];
});
