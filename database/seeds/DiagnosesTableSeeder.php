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

<<<<<<< HEAD

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
=======
          $diagnoses->each(function ($diagnosis) {
              $diagnosis->indications()->attach(factory(Indication::class)->create());
              $diagnosis->indications()->attach(factory(Indication::class)->create());
              $diagnosis->indications()->attach(factory(Indication::class)->create());
>>>>>>> 63ba1060e753a0b832b5b82ec4cefd10a62bf2d3
              $diagnosis->save();
             });
    }
}
