<?php

use Faker\Generator as Faker;
use App\User;
use App\Person;

$factory->define(App\Auditor::class, function (Faker $faker) {
    return [
      'user_id'=> User::inRandomOrder()->first(),
      'person_id'=> Person::inRandomOrder()->first(),
    ];
});
