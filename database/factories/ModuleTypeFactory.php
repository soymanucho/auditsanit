<?php

use Faker\Generator as Faker;

$factory->define(App\ModuleType::class, function (Faker $faker) {
    return [
      'name'=> $faker->word(),
    ];
});
