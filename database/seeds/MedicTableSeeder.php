<?php

use Illuminate\Database\Seeder;
use App\Medic;
class MedicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Medic::class, 50)->create();
    }
}
