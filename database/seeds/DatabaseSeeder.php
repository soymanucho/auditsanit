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
           StatusesTableSeeder::class,
           InstructionsTableSeeder::class,
           ObjetivesTableSeeder::class,
           ProvincesTableSeeder::class,
           LocationsTableSeeder::class,
           AddressesTableSeeder::class,
           GendersTableSeeder::class,
           PeopleTableSeeder::class,
           PatientTableSeeder::class,
           AuditTableSeeder::class,
           DiagnosesTableSeeder::class,
           CommentsTableSeeder::class,
           ]
       );
    }
}
