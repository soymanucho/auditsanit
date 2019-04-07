<?php

use App\Expedient;
use App\Client;
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

$factory->define(Expedient::class, function (Faker $faker) {

    return [
        'title' => $faker->sentence( 6, true),
        'client_id' =>  Client::orderByRaw('RAND()')->first(),
        'patient_id' =>  Patient::orderByRaw('RAND()')->first(),
      
    ];
});
