<?php

use Illuminate\Database\Seeder;
use App\Indication;
use App\Expedient;

class IndicationstableSeeder extends Seeder
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
        factory(Indication::class)->create(['expedient_id' => $expedient->id]);

      }
      $expedient->save();
         });
    }
}
