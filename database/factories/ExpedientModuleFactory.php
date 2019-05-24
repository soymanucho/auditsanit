<?php

use Faker\Generator as Faker;
use App\ModuleType;
use App\Module;
use App\Expedient;

$factory->define(App\ExpedientModule::class, function (Faker $faker) {
    return [
      'module_id'=> Module::inRandomOrder()->first(),
      'expedient_id'=> Expedient::inRandomOrder()->first(),
      'recommended_module_id'=> Module::inRandomOrder()->first(),
      'price'=> $faker->randomNumber(4,false),
    ];
});
