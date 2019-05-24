<?php

use Illuminate\Database\Seeder;
use App\ModuleType;
use App\ModuleCategory;
use App\Module;
use Faker\Factory as Faker;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //factory(Module::class, 120)->create();

      $moduletypes = ModuleType::all();
      $modulecategories = ModuleCategory::all();
      $faker = Faker::create();

    foreach ($modulecategories as $modulecategory) {
      foreach ($moduletypes as $moduletype) {


          $Module = new Module;
          $Module->module_type_id = $moduletype->id;
          $Module->module_category_id = $modulecategory->id;
          $Module->price = $faker->randomNumber(4,false);
          $Module->save();

        }
      }



    }
}
