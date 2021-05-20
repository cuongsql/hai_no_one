<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
<<<<<<< HEAD
        'email_verified_at' => now(),
=======
        'email_verified_at' => null,
>>>>>>> 07c1793d59f1f01bc80eb1d2fec0ff64c0c0960e
        'password' => \Illuminate\Support\Facades\Hash::make('123456789'), // password
        'remember_token' => null,
    ];
});
