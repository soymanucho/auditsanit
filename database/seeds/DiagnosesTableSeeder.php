<?php

use Illuminate\Database\Seeder;
use App\Diagnosis;

class DiagnosesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          factory(Diagnosis::class, 50)->create();
    }
}
