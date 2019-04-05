<?php

use Illuminate\Database\Seeder;

class DiagnosisTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('diagnosis_types')->insert(['name' => "Gonalgia"]);
          DB::table('diagnosis_types')->insert(['name' => "Artritis"]);
          DB::table('diagnosis_types')->insert(['name' => "Artrosis"]);
          DB::table('diagnosis_types')->insert(['name' => "Fractura"]);
          DB::table('diagnosis_types')->insert(['name' => "Luxacion"]);
    }
}
