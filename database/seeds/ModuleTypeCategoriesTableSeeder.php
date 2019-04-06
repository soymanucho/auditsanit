<?php

use Illuminate\Database\Seeder;
use App\ModuleTypeCategory;

class ModuleTypeCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(ModuleTypeCategory::class, 3)->create();
    }
}
