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
      DB::table('statuses')->insert(['name' => "Carga de expedientes",'color' => "#f56954",'isFinal' => false]);
      DB::table('statuses')->insert(['name' => "Cargados",'color' => "#f39c12",'isFinal' => false]);
      DB::table('statuses')->insert(['name' => "Inicial",'color' => "#3c8dbc",'isFinal' => false]);
      DB::table('statuses')->insert(['name' => "Verificación de coordinación de auditoría",'color' => "#00c0ef",'isFinal' => false]);
      DB::table('statuses')->insert(['name' => "Verificación de administrador",'color' => "#39CCCC",'isFinal' => false]);
      DB::table('statuses')->insert(['name' => "Finalizada",'color' => "#00a65a",'isFinal' => true]);
}
}
