<?php

use Faker\Generator as Faker;
use App\ModuleType;
use App\Expedient;

$factory->define(App\ExpedientModule::class, function (Faker $faker) {
    return [
      'module_type_id'=> ModuleType::orderByRaw('RAND()')->first(),
      'expedient_id'=> Expedient::orderByRaw('RAND()')->first(),
      'recommended_module_type_id'=> ModuleType::orderByRaw('RAND()')->first(),
    ];
});
