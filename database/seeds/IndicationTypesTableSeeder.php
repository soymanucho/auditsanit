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

      DB::table('indication_types')->insert(['name' => "Centro De Día - Jornada Doble"]);
      DB::table('indication_types')->insert(['name' => "Centro De Día - Jornada Simple"]);
      DB::table('indication_types')->insert(['name' => "Centro De Educativo Terapéutico - Jornada Doble"]);
      DB::table('indication_types')->insert(['name' => "Centro De Educativo Terapéutico - Jornada Simple"]);
      DB::table('indication_types')->insert(['name' => "Formación Laboral - Jornada Doble"]);
      DB::table('indication_types')->insert(['name' => "Formacion Laboral - Jornada Simple"]);
      DB::table('indication_types')->insert(['name' => "Aprest. Laboral - Jornada Doble"]);
      DB::table('indication_types')->insert(['name' => "Aprest. Laboral - Jornada Simple"]);
      DB::table('indication_types')->insert(['name' => "Escolaridad Pre-Primaria Jornada Doble"]);
      DB::table('indication_types')->insert(['name' => "Escolaridad Pre-Primaria Jornada Simple"]);
      DB::table('indication_types')->insert(['name' => "Escolaridad Primaria Jornada Doble"]);
      DB::table('indication_types')->insert(['name' => "Escolaridad Primaria Jornada Simple"]);
      DB::table('indication_types')->insert(['name' => "Hogar Permanente"]);
      DB::table('indication_types')->insert(['name' => "Hogar Lunes A Viernes"]);
      DB::table('indication_types')->insert(['name' => "Hogar Con Cd Lunes A Viernes"]);
      DB::table('indication_types')->insert(['name' => "Hogar Con Cet Lunes A Viernes"]);
      DB::table('indication_types')->insert(['name' => "Hogar Lunes A Viernes Con Formación Laboral"]);
      DB::table('indication_types')->insert(['name' => "Hogar Lunes A Viernes Con Pre-Primaria"]);
      DB::table('indication_types')->insert(['name' => "Hogar Lunes A Viernes Con Primaria"]);
      DB::table('indication_types')->insert(['name' => "Hogar Con Cd Permanente"]);
      DB::table('indication_types')->insert(['name' => "Hogar Con Cet Permanente"]);
      DB::table('indication_types')->insert(['name' => "Hogar Permanente Con Formación Laboral"]);
      DB::table('indication_types')->insert(['name' => "Hogar Permanente Con Pre-Primaria"]);
      DB::table('indication_types')->insert(['name' => "Hogar Permanente Con Primaria"]);
      DB::table('indication_types')->insert(['name' => "Pequeño Hogar Lunes A Viernes"]);
      DB::table('indication_types')->insert(['name' => "Pequeño Hogar Permanente"]);
      DB::table('indication_types')->insert(['name' => "Residencia Lunes A Viernes"]);
      DB::table('indication_types')->insert(['name' => "Residencia Permanente"]);
      DB::table('indication_types')->insert(['name' => "Estimulación Temprana"]);
      DB::table('indication_types')->insert(['name' => "Prestaciones De Apoyo"]);
      DB::table('indication_types')->insert(['name' => "Módulo Maestro De Apoyo"]);
      DB::table('indication_types')->insert(['name' => "Maestro De Apoyo"]);
      DB::table('indication_types')->insert(['name' => "Módulo De Apoyo A La Integración Escolar"]);
      DB::table('indication_types')->insert(['name' => "Rehabilitación - Módulo Integral Intensivo"]);
      DB::table('indication_types')->insert(['name' => "Rehabilitación - Módulo Integral Simple"]);
      DB::table('indication_types')->insert(['name' => "Rehabilitación - Hosp De Día Jornada Simple"]);
      DB::table('indication_types')->insert(['name' => "Rehabilitación - Hosp De Día Jornada Doble"]);
      DB::table('indication_types')->insert(['name' => "Rehabilitación – Internación"]);
      DB::table('indication_types')->insert(['name' => "Alimentación"]);
      DB::table('indication_types')->insert(['name' => "Transporte"]);
      DB::table('indication_types')->insert(['name' => "Migracion"]);

    }
}
