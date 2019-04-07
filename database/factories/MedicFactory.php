<?php

use Faker\Generator as Faker;
use App\Person;
use App\Medic;

$factory->define(Medic::class, function (Faker $faker) {
    return [
      'license'=>$faker->lexify('???????'),
      'isNationalLicense'=>$faker->boolean($chanceOfGettingTrue = 50),
      'person_id' =>  Person::orderByRaw('RAND()')->first(),
    ];
});
