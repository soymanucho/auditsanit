<?php

use Faker\Generator as Faker;
use App\Medic;
use App\Indication;
use App\IndicationType;

$factory->define(Indication::class, function (Faker $faker) {
    return [
        'medic_id'=> Medic::orderByRaw('RAND()')->first(),
        'indicationType_id'=> IndicationType::orderByRaw('RAND()')->first(),
        'aditionalDependance'=>$faker->boolean($chanceOfGettingTrue = 50),
        'numberOfSesions'=>$faker->randomDigitNotNull(),
    ];
});