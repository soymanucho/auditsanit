<?php

use Faker\Generator as Faker;
use App\Service;

$factory->define(App\ServiceSchedule::class, function (Faker $faker) {
    return [
      $init = $faker->dateTime('now',null);
      'initial_datetime'=> $init,
      'final_datetime'=> $faker->dateTime($init,null),
      'service_id'=> Service::orderByRaw('RAND()')->first(),

    ];
});
