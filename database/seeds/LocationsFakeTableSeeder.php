<?php

use Illuminate\Database\Seeder;
use App\Location;

class LocationsFakeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Location::class,50)->create();
    }
}
