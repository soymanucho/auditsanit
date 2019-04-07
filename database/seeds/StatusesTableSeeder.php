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
      DB::table('statuses')->insert(['name' => "Estado 1"]);
      DB::table('statuses')->insert(['name' => "Estado 2"]);
      DB::table('statuses')->insert(['name' => "Estado 3"]);
      DB::table('statuses')->insert(['name' => "Estado 4"]);
      DB::table('statuses')->insert(['name' => "Estado 5"]);
}
}
