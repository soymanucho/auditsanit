<?php

use App\Expedient;
use App\DiagnosisType;
use App\Patient;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Diagnosis::class, function (Faker $faker) {
    return [

        'diagnosisType_id' =>  DiagnosisType::inRandomOrder()->first(),
        'expedient_id'  =>  Expedient::inRandomOrder()->first(),
        'patient_id' => 0,//Patient::inRandomOrder()->first(), //copiar lo de arriba cuando tengamos la lista de pasientes
    ];
});
