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
          //$diagnoses = factory(Diagnosis::class, 50)->create();


          foreach (Expedient::all() as $expedient) {
            for ($i=0; $i < 3 ; $i++) { 

              $diagnosis = new Diagnosis();
              $diagnosis->diagnosisType_id = DiagnosisType::inRandomOrder()->first()->id;
              $diagnosis->expedient_id = $expedient->id;
              $diagnosis->patient_id = 0;
              $diagnosis->save();
            }
          }

          Diagnosis::all()->each(function ($diagnosis) {
              $diagnosis->indications()->attach(factory(Indication::class,2)->create());
              $diagnosis->save();
             });
    }
}
