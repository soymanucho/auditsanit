<?php

use Faker\Generator as Faker;
use App\ModuleType;
use App\Expedient;

$factory->define(App\ExpedientModule::class, function (Faker $faker) {
    return [
      'mod_typ_mod_typ_cat_id'=> ModuleType::orderByRaw('RAND()')->first(),
      'expedient_id'=> Expedient::orderByRaw('RAND()')->first(),
      'recommended_mod_typ_mod_typ_cat_id'=> ModuleType::orderByRaw('RAND()')->first(),
      'price'=> $faker->randomNumber(4,false),
    ];
});
