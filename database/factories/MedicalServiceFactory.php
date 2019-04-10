<?php

use Faker\Generator as Faker;
use App\ExpedientModule;
use App\TransportService;
use App\Service;
use App\Auditor;

$factory->define(App\MedicalService::class, function (Faker $faker) {
    return [
      'expedient_module_id'=> ExpedientModule::inRandomOrder()->first(),
      'service_id'=> Service::inRandomOrder()->first(),
      'transport_service_id'=> TransportService::inRandomOrder()->first(),
      'auditor_id'=> Auditor::inRandomOrder()->first(),
    ];
});
