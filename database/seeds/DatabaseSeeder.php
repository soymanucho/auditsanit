<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
           GenresTableSeeder::class,
           ProvincesTableSeeder::class,
           LocationsTableSeeder::class,
           AddressesTableSeeder::class,
           PersonsTableSeeder::class,
           ]
       );
    }
}
