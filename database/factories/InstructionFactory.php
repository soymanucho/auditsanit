<?php

use Faker\Generator as Faker;
use App\Instruction;
$factory->define(Instruction::class, function (Faker $faker) {
    return [
        "name"=>$faker->sentence( 2, false),
    ];
});
