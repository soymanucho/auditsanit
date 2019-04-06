<?php

use Illuminate\Database\Seeder;
use App\Objetive;
class ObjetivesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Objetive::class, 10)->create();
    }
}
