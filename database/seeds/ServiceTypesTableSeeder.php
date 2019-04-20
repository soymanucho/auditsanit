<?php

use Illuminate\Database\Seeder;
use App\ServiceType;

class ServiceTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(ServiceType::class, 10)->create();
    }
}
