<?php

use Faker\Generator as Faker;
use App\Genre;

$factory->define(App\Person::class, function (Faker $faker) {
    return [
      'name'=>$faker->firstName(),
      'surname'=>$faker->lastName(),
      'dni'=>$faker->randomNumber($nbDigits = 8, $strict = false),
      'birth_date'=>$faker->dateTime($max = 'now', $timezone = null),
      'genre_id'=> Genre::orderByRaw('RAND()')->first(),
    ];
});
