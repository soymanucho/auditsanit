<?php

use Illuminate\Database\Seeder;
use App\Instruction;
class InstructionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          factory(Instruction::class, 10)->create();
    }
}
