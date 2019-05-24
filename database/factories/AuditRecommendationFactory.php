<?php

use Faker\Generator as Faker;
use App\Recommendation;
use App\Audit;

$factory->define(App\AuditRecommendation::class, function (Faker $faker) {
    return [
      'recommendation_id'=> Recommendation::inRandomOrder()->first(),
      'audit_id'=> Audit::inRandomOrder()->first(),
    ];
});
