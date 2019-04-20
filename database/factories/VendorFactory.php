<?php

use Faker\Generator as Faker;
use App\Address;
use App\VendorType;

$factory->define(App\Vendor::class, function (Faker $faker) {
    return [
      'name'=> $faker->company(),
      'address_id'=> Address::inRandomOrder()->first(),
      'vendor_type_id'=> VendorType::inRandomOrder()->first(),
      'snr_category'=> $faker->sentence(2,true),
      'jury_person'=> $faker->boolean(),
    ];
});
