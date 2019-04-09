<?php

use Illuminate\Database\Seeder;
use App\Audit;
use App\Objetive;
use App\Instruction;
use App\Recommendation;
class AuditTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $audits = factory(Audit::class, 50)->create();

      $audits->each(function ($audit) {
        $audit->objetives()->attach(Objetive::orderByRaw('RAND()')->first());
        $audit->save();
       });

       $audits->each(function ($audit) {
         $audit->instructions()->attach(Instruction::orderByRaw('RAND()')->first());
         $audit->save();
        });

        $audits->each(function ($audit) {
          $audit->instructions()->attach(Recommendation::orderByRaw('RAND()')->first());
          $audit->save();
         });
    }
}
