<?php

use Illuminate\Database\Seeder;

class MedicaalServiceStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('medical_service_statuses')->insert(['name' => "Asignado",'color' => "#f39c12"]);
      DB::table('medical_service_statuses')->insert(['name' => "Aceptado",'color' => "#00a65a"]);
      DB::table('medical_service_statuses')->insert(['name' => "Rechazado",'color' => "#f56954"]);

    }
}
