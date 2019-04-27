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
           GendersTableSeeder::class,
           VendorTypeTableSeeder::class,
           ProvincesTableSeeder::class,
           LocationsTableSeeder::class,
           AddressesTableSeeder::class,
           PeopleTableSeeder::class,
           UsersTableSeeder::class,
           ClientTableSeeder::class,
           DiagnosisTypeTableSeeder::class,
           StatusesTableSeeder::class,
           InstructionsTableSeeder::class,
           ObjectivesTableSeeder::class,
           RecommendationsTableSeeder::class,
           AuditorsTableSeeder::class,
           ServiceTypesTableSeeder::class,
           VendorsTableSeeder::class,
           // ServicesTableSeeder::class,
           // TransportServicesTableSeeder::class,
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
           IndicationstableSeeder::class,
           CommentsTableSeeder::class,
           ServiceSchedulesTableSeeder::class,
           RolesTableSeeder::class,

           ]
       );
    }
}
