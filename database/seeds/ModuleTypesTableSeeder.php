<?php

use Illuminate\Database\Seeder;
use App\ModuleType;

class ModuleTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // factory(ModuleType::class, 5)->create();

      DB::table('module_types')->insert(['name' => "Centro De Día - Jornada Doble"]);
      DB::table('module_types')->insert(['name' => "Centro De Día - Jornada Simple"]);
      DB::table('module_types')->insert(['name' => "Centro De Educativo Terapéutico - Jornada Doble"]);
      DB::table('module_types')->insert(['name' => "Centro De Educativo Terapéutico - Jornada Simple"]);
      DB::table('module_types')->insert(['name' => "Formación Laboral - Jornada Doble"]);
      DB::table('module_types')->insert(['name' => "Formacion Laboral - Jornada Simple"]);
      DB::table('module_types')->insert(['name' => "Aprest. Laboral - Jornada Doble"]);
      DB::table('module_types')->insert(['name' => "Aprest. Laboral - Jornada Simple"]);
      DB::table('module_types')->insert(['name' => "Escolaridad Pre-Primaria Jornada Doble"]);
      DB::table('module_types')->insert(['name' => "Escolaridad Pre-Primaria Jornada Simple"]);
      DB::table('module_types')->insert(['name' => "Escolaridad Primaria Jornada Doble"]);
      DB::table('module_types')->insert(['name' => "Escolaridad Primaria Jornada Simple"]);
      DB::table('module_types')->insert(['name' => "Hogar Permanente"]);
      DB::table('module_types')->insert(['name' => "Hogar Lunes A Viernes"]);
      DB::table('module_types')->insert(['name' => "Hogar Con Cd Lunes A Viernes"]);
      DB::table('module_types')->insert(['name' => "Hogar Con Cet Lunes A Viernes"]);
      DB::table('module_types')->insert(['name' => "Hogar Lunes A Viernes Con Formación Laboral"]);
      DB::table('module_types')->insert(['name' => "Hogar Lunes A Viernes Con Pre-Primaria"]);
      DB::table('module_types')->insert(['name' => "Hogar Lunes A Viernes Con Primaria"]);
      DB::table('module_types')->insert(['name' => "Hogar Con Cd Permanente"]);
      DB::table('module_types')->insert(['name' => "Hogar Con Cet Permanente"]);
      DB::table('module_types')->insert(['name' => "Hogar Permanente Con Formación Laboral"]);
      DB::table('module_types')->insert(['name' => "Hogar Permanente Con Pre-Primaria"]);
      DB::table('module_types')->insert(['name' => "Hogar Permanente Con Primaria"]);
      DB::table('module_types')->insert(['name' => "Pequeño Hogar Lunes A Viernes"]);
      DB::table('module_types')->insert(['name' => "Pequeño Hogar Permanente"]);
      DB::table('module_types')->insert(['name' => "Residencia Lunes A Viernes"]);
      DB::table('module_types')->insert(['name' => "Residencia Permanente"]);
      DB::table('module_types')->insert(['name' => "Estimulación Temprana"]);
      DB::table('module_types')->insert(['name' => "Prestaciones De Apoyo"]);
      DB::table('module_types')->insert(['name' => "Módulo Maestro De Apoyo"]);
      DB::table('module_types')->insert(['name' => "Maestro De Apoyo"]);
      DB::table('module_types')->insert(['name' => "Módulo De Apoyo A La Integración Escolar"]);
      DB::table('module_types')->insert(['name' => "Rehabilitación - Módulo Integral Intensivo"]);
      DB::table('module_types')->insert(['name' => "Rehabilitación - Módulo Integral Simple"]);
      DB::table('module_types')->insert(['name' => "Rehabilitación - Hosp De Día Jornada Simple"]);
      DB::table('module_types')->insert(['name' => "Rehabilitación - Hosp De Día Jornada Doble"]);
      DB::table('module_types')->insert(['name' => "Rehabilitación – Internación"]);
      DB::table('module_types')->insert(['name' => "Alimentación"]);
      DB::table('module_types')->insert(['name' => "Transporte"]);
    }
}
