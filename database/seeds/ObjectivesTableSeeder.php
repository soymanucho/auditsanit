<?php

use Illuminate\Database\Seeder;
use App\Objective;
class ObjectivesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('objectives')->insert(['name' => "Verificar si recibe las prestaciones indicadas"]);
      DB::table('objectives')->insert(['name' => "Comprobar si cumple el cronograma del expediente"]);
      DB::table('objectives')->insert(['name' => "Comprobar si las prestaciones se realizan en domicilio declarado en expediente"]);
      DB::table('objectives')->insert(['name' => "Descripción y análisis de antecedentes prestacionales"]);
      DB::table('objectives')->insert(['name' => "Descripción y análisis de proyecto de trabajo actual"]);
      DB::table('objectives')->insert(['name' => "Descripción y análisis de evolución por cada prestación"]);
      DB::table('objectives')->insert(['name' => "Comprobar la necesidad de adicional por dependencia"]);
      DB::table('objectives')->insert(['name' => "Comprobar la necesidad de las prestaciones indicadas"]);
      DB::table('objectives')->insert(['name' => "Evaluar la pertinencia de las modalidades autorizadas"]);
      DB::table('objectives')->insert(['name' => "Constatar correspondencia del kilometraje de transporte"]);
      DB::table('objectives')->insert(['name' => "Ofrecer recomendaciones para mejorar la evolución del/la afiliado/a"]);
    }
}
