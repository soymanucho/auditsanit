<?php

use App\Expedient;
use App\DiagnosisType;
use Faker\Generator as Faker;
use App\Diagnosis;


$factory->define(Diagnosis::class, function (Faker $faker) {
    return [
        'diagnosisType_id' =>  DiagnosisType::inRandomOrder()->first(),
        'expedient_id'  =>  Expedient::inRandomOrder()->first(),
        'patient_id' => 0,//Patient::inRandomOrder()->first(), //copiar lo de arriba cuando tengamos la lista de pasientes
    ];
});
