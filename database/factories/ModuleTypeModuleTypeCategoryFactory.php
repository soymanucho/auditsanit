<?php

use Faker\Generator as Faker;
use App\ModuleType;
use App\ModuleTypeCategory;

$factory->define(App\ModuleTypeModuleTypeCategory::class, function (Faker $faker) {
    return [
      'module_type_id'=> 'province_id' =>  ModuleType::orderByRaw('RAND()')->first(),
      'module_type_category_id'=> 'province_id' =>  ModuleTypeCategory::orderByRaw('RAND()')->first(),
      'price'=> $faker->randomNumber(4,false),
    ];
});
