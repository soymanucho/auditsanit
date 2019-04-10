<?php

use Faker\Generator as Faker;
use App\User;
use App\Person;

$factory->define(App\Auditor::class, function (Faker $faker) {
    return [
      'user_id'=> User::orderByRaw('RANDOM()')->first(),
      'person_id'=> Person::orderByRaw('RANDOM()')->first(),
    ];
});
