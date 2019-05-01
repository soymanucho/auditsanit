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
      // factory(ModuleCategory::class, 3)->create();
      DB::table('module_categories')->insert(['name' => "Cat A"]);
      DB::table('module_categories')->insert(['name' => "Cat B"]);
      DB::table('module_categories')->insert(['name' => "Cat C"]);
    }
}
