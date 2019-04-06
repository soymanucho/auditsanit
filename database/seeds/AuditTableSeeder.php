<?php

use Illuminate\Database\Seeder;
use App\Audit;

class AuditTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Audit::class, 50)->create();
    }
}
