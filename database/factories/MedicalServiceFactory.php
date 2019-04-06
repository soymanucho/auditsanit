<?php

use Faker\Generator as Faker;
use App\ExpedientModule;
use App\TransportService;
use App\Service;

$factory->define(App\MedicalService::class, function (Faker $faker) {
    return [
      'expedient_module_id'=> ExpedientModule::orderByRaw('RAND()')->first(),
      'service_id'=> Service::orderByRaw('RAND()')->first(),
      'transport_service_id'=> TransportService::orderByRaw('RAND()')->first(),
    ];
});
