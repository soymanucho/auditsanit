<?php

use Faker\Generator as Faker;

$factory->define(App\Recommendation::class, function (Faker $faker) {
    return [
      'name'=> $faker->sentence(5,false),
    ];
});
