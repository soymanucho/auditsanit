<?php

use Faker\Generator as Faker;
use App\Vendor;
use App\MedicalServiceType;

$factory->define(App\Service::class, function (Faker $faker) {
    return [
      'vendor_id'=> Vendor::orderByRaw('RAND()')->first(),
      'medical_service_type_id'=> MedicalServiceType::orderByRaw('RAND()')->first(),
    ];
});
