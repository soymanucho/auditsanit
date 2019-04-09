<?php

use Illuminate\Database\Seeder;
use App\Patient;
class PatientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Patient::class, 10)->create();
    }
}
