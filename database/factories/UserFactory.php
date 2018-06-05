<?php

use Faker\Generator as Faker;

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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
      'name' => 'Jose Acopa',
      'email' => 'jose.acopa.martinez@gmail.com',
      'phone' => 9931436460,
      'user' => 'JA',
      'role_id' => 1,
      'password' => $password = bcrypt('123'),
      'remember_token' => str_random(10),
    ];
});
