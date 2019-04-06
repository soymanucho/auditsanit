<?php

use Illuminate\Database\Seeder;
use App\MedicalServiceType;

class MedicalServiceTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(MedicalServiceType::class, 10)->create();
    }
}
