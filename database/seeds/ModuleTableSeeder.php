<?php

use Illuminate\Database\Seeder;
use App\ModuleTypeModuleTypeCategory;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Module::class, 120)->create();
    }
}
