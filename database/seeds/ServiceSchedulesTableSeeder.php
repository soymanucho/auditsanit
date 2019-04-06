<?php

use Illuminate\Database\Seeder;
use App\ServiceSchedule;

class ServiceSchedulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(ServiceSchedule::class, 20)->create();
    }
}
