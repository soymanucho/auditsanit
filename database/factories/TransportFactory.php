<?php

use Faker\Generator as Faker;
use App\Service;

$factory->define(App\TransportService::class, function (Faker $faker) {


    return [
      'service_id'=> factory(Service::class)->create()->id,
      'km_per_month'=> $faker->randomNumber(3,false),
    ];
});
