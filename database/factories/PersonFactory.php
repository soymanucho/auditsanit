<?php

use Faker\Generator as Faker;
use App\Genre;

$factory->define(App\Person::class, function (Faker $faker) {
    return [
      'name'=>$faker->firstName(),
      'surname'=>$faker->lastName(),
      'dni'=>$faker->randomNumber(8, false),
      'birth_date'=>$faker->dateTime('now', null),
      'genre_id'=> Genre::orderByRaw('RAND()')->first(),
    ];
});
