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
           UsersTableSeeder::class,
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
           RecommendationsTableSeeder::class,

           AuditorsTableSeeder::class,
           MedicalServiceTypesTableSeeder::class,
           VendorsTableSeeder::class,
           ServicesTableSeeder::class,
           ServiceSchedulesTableSeeder::class,
           TransportServicesTableSeeder::class,
           ModuleTypesTableSeeder::class,
           ModuleCategoriesTableSeeder::class,
           ModuleTableSeeder::class,
           MedicTableSeeder::class,
           IndicationTypesTableSeeder::class,
           PatientTableSeeder::class,
           AuditTableSeeder::class,
           ExpedientModulesTableSeeder::class,
           MedicalServicesTableSeeder::class,
           DiagnosesTableSeeder::class,
           CommentsTableSeeder::class,

           ]
       );
    }
}
