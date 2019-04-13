<?php

use Illuminate\Database\Seeder;
use App\MedicalService;
use App\Service;
use App\ExpedientModule;
use App\TransportService;

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
        for ($i=0; $i < 3 ; $i++) {

          $medicalService = new MedicalService();
          $medicalService->expedient_module_id = $moduleExpedient->id;
          $medicalService->service_id = factory(Service::class)->create()->id;
          $medicalService->transport_service_id = factory(TransportService::class)->create()->id;
          $medicalService->save();
        }
      }
    }
}
