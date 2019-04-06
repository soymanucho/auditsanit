<?php

use Faker\Generator as Faker;
use App\Service;

$factory->define(App\TransportService::class, function (Faker $faker) {
    return [
      'service_id'=> Service::orderByRaw('RAND()')->first(),
      'km_per_month'=> $faker->randomNumber(3,false),
    ];
});
