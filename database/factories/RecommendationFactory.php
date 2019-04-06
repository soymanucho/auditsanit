<?php

use Faker\Generator as Faker;

$factory->define(App\Recommendation::class, function (Faker $faker) {
    return [
      'descrip'=> $faker->sentence(5,false),
    ];
});
