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
          DB::table('diagnosis_types')->insert(['name' => "Gonalgia",'code' => "AAAAA"]);
          DB::table('diagnosis_types')->insert(['name' => "Artritis",'code' => "BBBBB"]);
          DB::table('diagnosis_types')->insert(['name' => "Artrosis",'code' => "CCCCC"]);
          DB::table('diagnosis_types')->insert(['name' => "Fractura",'code' => "DDDDD"]);
          DB::table('diagnosis_types')->insert(['name' => "Luxacion",'code' => "EEEEE"]);
    }
}
