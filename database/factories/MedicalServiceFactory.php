<?php

use Faker\Generator as Faker;
use App\ExpedientModule;
use App\TransportService;
use App\Service;
use App\Auditor;
use App\MedicalServiceStatus;

$factory->define(App\MedicalService::class, function (Faker $faker) {
    return [
      'expedient_module_id'=> ExpedientModule::inRandomOrder()->first(),
      'service_id'=> factory(Service::class)->create()->id,
      'transport_service_id'=> factory(TransportService::class)->create()->id,
      'auditor_id'=> Auditor::inRandomOrder()->first(),
      'report' => $faker->sentence(150, false),
      'status_id'=> MedicalServiceStatus::inRandomOrder()->first(),
    ];
});
