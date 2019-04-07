<?php

use Faker\Generator as Faker;
use App\ModuleType;
use App\ModuleTypeCategory;

$factory->define(App\ModuleTypeModuleTypeCategory::class, function (Faker $faker) {
    return [
      'mod_typ_id' =>  ModuleType::orderByRaw('RAND()')->first(),
      'mod_typ_cat_id' =>  ModuleTypeCategory::orderByRaw('RAND()')->first(),
      'price'=> $faker->randomNumber(4,false),
    ];
});
