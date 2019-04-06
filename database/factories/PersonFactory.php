<?php

use Faker\Generator as Faker;
use App\Gender;

$factory->define(App\Person::class, function (Faker $faker) {
    return [
      'name'=>$faker->firstName(),
      'surname'=>$faker->lastName(),
      'dni'=>$faker->randomNumber(8, false),
      'birth_date'=>$faker->dateTime('now', null),
      'gender_id'=> Gender::orderByRaw('RAND()')->first(),
    ];
});
