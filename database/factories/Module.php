<?php

use Faker\Generator as Faker;
use App\ModuleType;
use App\ModuleCategory;

$factory->define(App\Module::class, function (Faker $faker) {
    return [
      'module_type_id' =>  ModuleType::orderByRaw('RAND()')->first(),
      'module__category_id' =>  ModuleCategory::orderByRaw('RAND()')->first(),
      'price'=> $faker->randomNumber(4,false),
    ];
});
