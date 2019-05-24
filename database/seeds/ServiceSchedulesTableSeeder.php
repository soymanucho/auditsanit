<?php

use Illuminate\Database\Seeder;
use App\ServiceSchedule;
use App\Service;

class ServiceSchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      foreach (Service::all() as $service) {
        factory(ServiceSchedule::class, rand(0,5))->create([
          'service_id' => $service->id,
          ]);
      }

    }
}
