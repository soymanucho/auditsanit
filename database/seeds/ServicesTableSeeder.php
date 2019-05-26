<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Service::class, 20)->create();
      DB::table('services')->insert(['vendor_id' => 1,'service_type_id'=>1]);
    }
}
