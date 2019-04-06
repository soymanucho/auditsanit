<?php

use Illuminate\Database\Seeder;
use App\ExpedientModule;

class ExpedientModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(ExpedientModule::class, 10)->create();
    }
}
