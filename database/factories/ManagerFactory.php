<?php

use Faker\Generator as Faker;
use App\Models\Manager;

$factory->define(Manager::class, function (Faker $faker) {
    return[
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'facebook_id' => Str::random(100),
        'phone' => rand(1111111111,9999999999),
        'birthday' => date('Y.m.d'),
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => Str::random(10),
    ];
});
