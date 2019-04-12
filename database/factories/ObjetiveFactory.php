<?php

use Faker\Generator as Faker;
use App\Objective;
$factory->define(Objective::class, function (Faker $faker) {
    return [
        "name"=>$faker->sentence( 2, false),
    ];
});
