<?php

use Illuminate\Database\Seeder;
use App\Diagnosis;
use App\Indication;

class DiagnosesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $diagnoses = factory(Diagnosis::class, 50)->create();

          $diagnoses->each(function ($diagnosis) {
              $diagnosis->indications()->attach(factory(Indication::class,2)->create());
              $diagnosis->save();
             });
    }
}
