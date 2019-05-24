<?php

use Faker\Generator as Faker;
use App\Audit;
use App\Comment;
use App\User;
$factory->define(Comment::class, function (Faker $faker) {
    return [
        'audit_id' =>  Audit::inRandomOrder()->first(),
        "text"=>$faker->sentence( 8, true),
        'user_id' => User::inRandomOrder()->first(),
    ];
});
