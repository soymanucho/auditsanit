<?php

use Illuminate\Database\Seeder;
use App\Audit;
use App\Objective;
use App\Instruction;
use App\Recommendation;
use App\Status;
use Faker\Factory as Faker;

class AuditTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $audits = factory(Audit::class, 10)->create();

      $audits->each(function ($audit) {

        for ($i=0; $i < rand(0,5); $i++) {
          $audit->objectives()->attach(Objective::inRandomOrder()->first());
        }
        $audit->save();
       });

      $audits->each(function ($audit) {

        for ($i=0; $i < rand(0,5); $i++) {
            $audit->instructions()->attach(Instruction::inRandomOrder()->first());
        }
        $audit->save();
       });

      $audits->each(function ($audit) {

        for ($i=0; $i < rand(0,5); $i++) {
            $audit->recommendations()->attach(Recommendation::inRandomOrder()->first());
        }
        $audit->save();
       });


      $audits->each(function ($audit) {

        for ($i=0; $i < rand(1,5); $i++) {
          $faker = Faker::create();
            $audit->statuses()->attach(Status::inRandomOrder()->first(),['created_at' => $faker->dateTimeBetween($startDate = '-2 days', $endDate = 'now', $timezone = null)]);
        }

        $audit->save();
       });
    }
}
