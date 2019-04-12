<?php

use Illuminate\Database\Seeder;
use App\Audit;
use App\Objective;
use App\Instruction;
use App\Recommendation;
use App\Status;

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
        $audit->objectives()->attach(Objective::inRandomOrder()->first());
        $audit->objectives()->attach(Objective::inRandomOrder()->first());
        $audit->objectives()->attach(Objective::inRandomOrder()->first());
        $audit->save();
       });

      $audits->each(function ($audit) {
        $audit->instructions()->attach(Instruction::inRandomOrder()->first());
        $audit->instructions()->attach(Instruction::inRandomOrder()->first());
        $audit->instructions()->attach(Instruction::inRandomOrder()->first());
        $audit->save();
       });

      $audits->each(function ($audit) {
        $audit->recommendations()->attach(Recommendation::inRandomOrder()->first());
        $audit->recommendations()->attach(Recommendation::inRandomOrder()->first());
        $audit->recommendations()->attach(Recommendation::inRandomOrder()->first());
        $audit->save();
       });

      $audits->each(function ($audit) {
        $audit->statuses()->attach(Status::inRandomOrder()->first());
        $audit->statuses()->attach(Status::inRandomOrder()->first());
        $audit->statuses()->attach(Status::inRandomOrder()->first());
        $audit->statuses()->attach(Status::inRandomOrder()->first());
        $audit->save();
       });
    }
}
