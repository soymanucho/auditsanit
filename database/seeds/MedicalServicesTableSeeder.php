<?php

use Illuminate\Database\Seeder;
use App\MedicalServices;

class MedicalServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(MedicalServices::class, 25)->create();
    }
}
