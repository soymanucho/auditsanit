<?php

use Illuminate\Database\Seeder;
use App\Diagnosis;
use App\DiagnosisType;
use App\Indication;
use App\Expedient;

class DiagnosesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          Expedient::all()->each(function ($expedient) {

            for ($i=0; $i < rand(0,5); $i++) {
              $diagnosis = new Diagnosis();
              $diagnosis->expedient_id =  $expedient->id;
              $diagnosis->diagnosisType_id =  DiagnosisType::inRandomOrder()->first()->id;
              $diagnosis->patient_id =  0;
              $diagnosis->save();
            }

             });

          Diagnosis::all()->each(function ($diagnosis) {
          for ($i=0; $i < rand(0,5); $i++) { 
              $diagnosis->indications()->attach(factory(Indication::class)->create());
          }
          $diagnosis->save();
             });
    }
}
