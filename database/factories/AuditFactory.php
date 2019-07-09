<?php

use Faker\Generator as Faker;
use App\Expedient;
use App\Audit;



$factory->define(Audit::class, function (Faker $faker) {
    return [
      'conclution' => $faker->sentence( 50, false),
      'month' => date('n'),
      'year' => date('Y'),
      // 'report' => $faker->sentence(150, false),
      'expedient_id' =>  factory(Expedient::class)->create(),
    ];
});
