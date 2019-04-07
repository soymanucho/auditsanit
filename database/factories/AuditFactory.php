<?php

use Faker\Generator as Faker;
use App\Expedient;
use App\Audit;

$factory->define(Audit::class, function (Faker $faker) {


    return [
      'conclution' => $faker->sentence( 6, true),
      'report' => $faker->sentence( 6, true),
      'expedient_id' =>  factory(Expedient::class)->create(),

    ];
});
