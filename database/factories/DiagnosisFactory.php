<?php

use App\Expedient;
use App\DiagnosisType;
use App\Diagnosis;
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

        'id_diagnosisType' =>  DiagnosisType::orderByRaw('RAND()')->first(),
        'id_expedient'  =>  Expedient::orderByRaw('RAND()')->first(),
        'id_patient' =>  0, //copiar lo de arriba cuando tengamos la lista de pasientes
    ];
});
