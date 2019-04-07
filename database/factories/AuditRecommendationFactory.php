<?php

use Faker\Generator as Faker;
use App\Recommendation;
use App\Audit;

$factory->define(App\AuditRecommendation::class, function (Faker $faker) {
    return [
      'recommendation_id'=> Recommendation::orderByRaw('RAND()')->first(),
      'audit_id'=> Audit::orderByRaw('RAND()')->first(),
    ];
});
