<?php

use Illuminate\Database\Seeder;
use App\ModuleType;

class ModuleTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(ModuleType::class, 42)->create();
    }
}
