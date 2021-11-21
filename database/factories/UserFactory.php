<?php

declare(strict_types=1);

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;

// Model Factories

$attributes = fn(Faker $faker) => [
    'name' => $faker->name,
    'email' => $faker->unique()->safeEmail,
    'email_verified_at' => now(),
    'password' => 'secret',
    'remember_token' => Str::random(10),
];

/** @var Factory $factory */

$factory->define(User::class, $attributes);

$factory->defineAs(User::class, 'admin', $attributes);
