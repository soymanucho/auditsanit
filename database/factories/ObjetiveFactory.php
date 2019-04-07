<?php

use Faker\Generator as Faker;
use App\Objetive;
$factory->define(Objetive::class, function (Faker $faker) {
    return [
        "name"=>$faker->sentence( 2, false),
    ];
});
