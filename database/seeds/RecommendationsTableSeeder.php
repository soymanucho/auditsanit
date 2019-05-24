<?php

use Illuminate\Database\Seeder;
use App\Recommendation;

class RecommendationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Recommendation::class, 10)->create();
    }
}
