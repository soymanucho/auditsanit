<?php

use Faker\Generator as Faker;
use App\ModuleType;
use App\ModuleCategory;
use App\Module;

$factory->define(Module::class, function (Faker $faker) {
    return [
      'module_type_id' =>  ModuleType::inRandomOrder()->first(),
      'module_category_id' =>  ModuleCategory::inRandomOrder()->first(),
      'price'=> $faker->randomNumber(4,false),
    ];
});
