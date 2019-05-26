<?php

use Illuminate\Database\Seeder;
use App\ExpedientModule;
use App\Module;
use App\Expedient;
use App\Diagnosis;

class ExpedientModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //factory(ExpedientModule::class, 10)->create();

      foreach (Expedient::all() as $expedient) {
        for ($i=0; $i < rand(0,5) ; $i++) {

          $module = Module::inRandomOrder()->first();
          $moduloExpediente = new Expedientmodule();
          $moduloExpediente->module_id = $module->id;
          $moduloExpediente->recommended_module_id = Module::inRandomOrder()->first()->id;
          $moduloExpediente->expedient_id = $expedient->id;
          $moduloExpediente->price = $module->price;
          $moduloExpediente->save();
        }
      }
    }
}
