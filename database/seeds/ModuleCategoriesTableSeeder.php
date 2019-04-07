<?php

use Illuminate\Database\Seeder;
use App\ModuleCategory;

class ModuleCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(ModuleCategory::class, 3)->create();
    }
}
