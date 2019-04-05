<?php

use Illuminate\Database\Seeder;
use App\Expedient;
use App\Diagnoses;

class ExpedientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Expedient::class, 50)->create();
   }
}
