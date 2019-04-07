<?php

use Faker\Generator as Faker;
use App\ModuleType;
use App\ModuleCategory;
use App\Module;

$factory->define(Module::class, function (Faker $faker) {
    return [
      'module_type_id' =>  ModuleType::orderByRaw('RAND()')->first(),
      'module_category_id' =>  ModuleCategory::orderByRaw('RAND()')->first(),
      'price'=> $faker->randomNumber(4,false),
    ];
});
