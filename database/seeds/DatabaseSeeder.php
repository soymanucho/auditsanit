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
           ClientTableSeeder::class,
           DiagnosisTypeTableSeeder::class,
           AuditTableSeeder::class,
           DiagnosesTableSeeder::class,
           ProvincesTableSeeder::class,
           LocationsTableSeeder::class,
           AddressesTableSeeder::class,
           GenresTableSeeder::class,
           PersonsTableSeeder::class,
           ]
       );
    }
}
