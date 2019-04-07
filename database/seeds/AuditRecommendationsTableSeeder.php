<?php

use Illuminate\Database\Seeder;
use App\AuditRecommendation;

class AuditRecommendationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(AuditRecommendation::class, 5)->create();
    }
}
