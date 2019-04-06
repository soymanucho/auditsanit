<?php

use Illuminate\Database\Seeder;
use App\ModuleTypeModuleTypeCategory;

class ModuleTypeModuleTypeCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(ModuleTypeModuleTypeCategory::class, 120)->create();
    }
}
