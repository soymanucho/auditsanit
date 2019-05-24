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
      DB::table('indication_types')->insert(['name' => "Psicología"]);
      DB::table('indication_types')->insert(['name' => "Psicopedagogía"]);
      DB::table('indication_types')->insert(['name' => "Fonoaudiología"]);
      DB::table('indication_types')->insert(['name' => "Kinesiología"]);
      DB::table('indication_types')->insert(['name' => "Terapia Ocupacional"]);
      DB::table('indication_types')->insert(['name' => "Acompañante Terapéutico"]);
      DB::table('indication_types')->insert(['name' => "Cuidador Domiciliario"]);
      DB::table('indication_types')->insert(['name' => "Equinoterapia"]);
      DB::table('indication_types')->insert(['name' => "Hidroterapia"]);
      DB::table('indication_types')->insert(['name' => "Musicoterapia"]);
      DB::table('indication_types')->insert(['name' => "Neurokinesiología"]);
      DB::table('indication_types')->insert(['name' => "Pedagogía Especial"]);
      DB::table('indication_types')->insert(['name' => "Psicomotricidad"]);
      DB::table('indication_types')->insert(['name' => "Rehabilitación auditiva y del lenguaje"]);

    }
}
