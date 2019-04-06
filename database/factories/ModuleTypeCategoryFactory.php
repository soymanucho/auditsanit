<?php

use Faker\Generator as Faker;

$factory->define(App\ModuleTypeCategory::class, function (Faker $faker) {
    return [
      'name'=> $faker->word(),
    ];
});
