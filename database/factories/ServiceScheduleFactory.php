<?php

use Faker\Generator as Faker;
use App\Service;

$factory->define(App\ServiceSchedule::class, function (Faker $faker) {
    return [

      'initial_datetime'=> $faker->dateTime('now',null),
      'final_datetime'=> $faker->dateTime('initial_datetime',null),
      'service_id'=> Service::inRandomOrder()->first(),

    ];
});
