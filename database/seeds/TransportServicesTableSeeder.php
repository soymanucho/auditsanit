<?php

use Illuminate\Database\Seeder;
use App\TransportService;

class TransportServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(TransportService::class, 5)->create();
    }
}
