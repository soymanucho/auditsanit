<?php

use Faker\Generator as Faker;
use App\Patient;
use App\Person;

$factory->define(Patient::class, function (Faker $faker) {
    return [
      'person_id'=> Person::inRandomOrder()->first(),
    ];
});
