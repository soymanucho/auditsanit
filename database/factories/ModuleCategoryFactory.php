<?php

use Faker\Generator as Faker;

$factory->define(App\ModuleCategory::class, function (Faker $faker) {
    return [
      'name'=> $faker->word(),
    ];
});
