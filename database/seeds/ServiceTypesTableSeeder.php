<?php

use Illuminate\Database\Seeder;
use App\ServiceType;

class ServiceTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // factory(ServiceType::class, 10)->create();
      DB::table('service_types')->insert(['name' => 'Migración','is_transport_service'=>false]);

      DB::table('service_types')->insert(['name' => "Psicología",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Psicopedagogía",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Fonoaudiología",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Kinesiología",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Terapia Ocupacional",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Acompañante Terapéutico",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Cuidador Domiciliario",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Equinoterapia",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Hidroterapia",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Musicoterapia",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Neurokinesiología",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Pedagogía Especial",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Psicomotricidad",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Rehabilitación auditiva y del lenguaje",'is_transport_service'=>false]);

      DB::table('service_types')->insert(['name' => "Centro De Día - Jornada Doble",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Centro De Día - Jornada Simple",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Centro De Educativo Terapéutico - Jornada Doble",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Centro De Educativo Terapéutico - Jornada Simple",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Formación Laboral - Jornada Doble",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Formacion Laboral - Jornada Simple",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Aprest. Laboral - Jornada Doble",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Aprest. Laboral - Jornada Simple",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Escolaridad Pre-Primaria Jornada Doble",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Escolaridad Pre-Primaria Jornada Simple",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Escolaridad Primaria Jornada Doble",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Escolaridad Primaria Jornada Simple",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Hogar Permanente",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Hogar Lunes A Viernes",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Hogar Con Cd Lunes A Viernes",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Hogar Con Cet Lunes A Viernes",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Hogar Lunes A Viernes Con Formación Laboral",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Hogar Lunes A Viernes Con Pre-Primaria",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Hogar Lunes A Viernes Con Primaria",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Hogar Con Cd Permanente",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Hogar Con Cet Permanente",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Hogar Permanente Con Formación Laboral",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Hogar Permanente Con Pre-Primaria",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Hogar Permanente Con Primaria",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Pequeño Hogar Lunes A Viernes",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Pequeño Hogar Permanente",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Residencia Lunes A Viernes",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Residencia Permanente",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Estimulación Temprana",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Prestaciones De Apoyo",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Módulo Maestro De Apoyo",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Maestro De Apoyo",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Módulo De Apoyo A La Integración Escolar",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Rehabilitación - Módulo Integral Intensivo",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Rehabilitación - Módulo Integral Simple",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Rehabilitación - Hosp De Día Jornada Simple",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Rehabilitación - Hosp De Día Jornada Doble",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Rehabilitación – Internación",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Alimentación",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Transporte",'is_transport_service'=>false]);
      DB::table('service_types')->insert(['name' => "Migracion",'is_transport_service'=>false]);
    }
}
