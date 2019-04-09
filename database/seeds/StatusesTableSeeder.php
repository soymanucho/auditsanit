<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('statuses')->insert(['name' => "Carga de expedientes"]);
      DB::table('statuses')->insert(['name' => "Cargados"]);
      DB::table('statuses')->insert(['name' => "Inicial"]);
      DB::table('statuses')->insert(['name' => "Verificación de coordinación de auditoría"]);
      DB::table('statuses')->insert(['name' => "Verificación de administrador"]);
      DB::table('statuses')->insert(['name' => "Finalizada"]);
}
}
