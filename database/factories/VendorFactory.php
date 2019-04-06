<?php

use Faker\Generator as Faker;
use App\Address;
use App\Auditor;

$factory->define(App\Vendor::class, function (Faker $faker) {
    return [
      'name'=> $faker->company(),
      'address_id'=> Address::orderByRaw('RAND()')->first(),
      'snr_category'=> $faker->sentence(2,true),
      'jury_person'=> $faker->sentence(2,true),
      'auditor_id'=> Auditor::orderByRaw('RAND()')->first(),
      'dependency_additional'=> $faker->boolean(),
    ];
});
