<?php

use Illuminate\Database\Seeder;
use App\MedicalService;
use App\Service;
use App\ExpedientModule;
use App\TransportService;
use App\Auditor;
use App\MedicalServiceStatus;

class MedicalServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //factory(MedicalService::class, 25)->create();

      foreach (ExpedientModule::all() as $moduleExpedient) {
        for ($i=0; $i < rand(0,5) ; $i++) {

            factory(MedicalService::class)->create(['expedient_module_id' => $moduleExpedient->id]);
        
        }
      }
    }
}
