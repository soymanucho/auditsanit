<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('clients')->insert(['companyName' => "OSECAC"]);
      DB::table('clients')->insert(['companyName' => "OSDE"]);
      DB::table('clients')->insert(['companyName' => "OSDIPP"]);
      DB::table('clients')->insert(['companyName' => "SANCOR"]);
    }
}
