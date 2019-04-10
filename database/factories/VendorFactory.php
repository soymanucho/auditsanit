<?php

use Faker\Generator as Faker;
use App\Address;

$factory->define(App\Vendor::class, function (Faker $faker) {
    return [
      'name'=> $faker->company(),
      'address_id'=> Address::inRandomOrder()->first(),
      'snr_category'=> $faker->sentence(2,true),
      'jury_person'=> $faker->sentence(2,true),
      'dependency_additional'=> $faker->boolean(),
    ];
});
