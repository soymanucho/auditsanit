<?php

use Illuminate\Database\Seeder;

class IndicationTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('indication_types')->insert(['name' => "Indicacion 1"]);
      DB::table('indication_types')->insert(['name' => "Indicacion 2"]);
      DB::table('indication_types')->insert(['name' => "Indicacion 3"]);
      DB::table('indication_types')->insert(['name' => "Indicacion 4"]);
      DB::table('indication_types')->insert(['name' => "Indicacion 5"]);

    }
}
