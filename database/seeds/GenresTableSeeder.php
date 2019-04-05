<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('genres')->insert(['name' => "Femenino"]);
      DB::table('genres')->insert(['name' => "Masculino"]);
      DB::table('genres')->insert(['name' => "No binario"]);
    }
}
