<?php

use Faker\Generator as Faker;
use App\Vendor;
use App\ServiceType;

$factory->define(App\Service::class, function (Faker $faker) {
    return [
      'vendor_id'=> Vendor::inRandomOrder()->first(),
      'service_type_id'=> ServiceType::inRandomOrder()->first(),
    ];
});
