<?php

use Illuminate\Database\Seeder;
use App\MedicalService;

class MedicalServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(MedicalService::class, 25)->create();
    }
}