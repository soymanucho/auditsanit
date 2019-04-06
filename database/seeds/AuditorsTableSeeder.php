<?php

use Illuminate\Database\Seeder;
use App\Auditor;

class AuditorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Auditor::class, 5)->create();
    }
}
