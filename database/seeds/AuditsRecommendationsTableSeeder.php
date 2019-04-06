<?php

use Illuminate\Database\Seeder;
use App\Auditor;
use App\Audit;
use App\Recommendation;

class AuditsRecommendationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('audit_recomendations')->insert([
                                                  'recommendation_id' => Recommendation::orderByRaw('RAND()')->first(),
                                                  'audit_id'=> Audit::orderByRaw('RAND()')->first()
                                                  ]);
        DB::table('audit_recomendations')->insert([
                                                  'recommendation_id' => Recommendation::orderByRaw('RAND()')->first(),
                                                  'audit_id'=> Audit::orderByRaw('RAND()')->first()
                                                  ]);
        DB::table('audit_recomendations')->insert([
                                                  'recommendation_id' => Recommendation::orderByRaw('RAND()')->first(),
                                                  'audit_id'=> Audit::orderByRaw('RAND()')->first()
                                                  ]);
        DB::table('audit_recomendations')->insert([
                                                  'recommendation_id' => Recommendation::orderByRaw('RAND()')->first(),
                                                  'audit_id'=> Audit::orderByRaw('RAND()')->first()
                                                  ]);
        DB::table('audit_recomendations')->insert([
                                                  'recommendation_id' => Recommendation::orderByRaw('RAND()')->first(),
                                                  'audit_id'=> Audit::orderByRaw('RAND()')->first()
                                                  ]);
        DB::table('audit_recomendations')->insert([
                                                  'recommendation_id' => Recommendation::orderByRaw('RAND()')->first(),
                                                  'audit_id'=> Audit::orderByRaw('RAND()')->first()
                                                  ]);
        DB::table('audit_recomendations')->insert([
                                                  'recommendation_id' => Recommendation::orderByRaw('RAND()')->first(),
                                                  'audit_id'=> Audit::orderByRaw('RAND()')->first()
                                                  ]);

    }
}
