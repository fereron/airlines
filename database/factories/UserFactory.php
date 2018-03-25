<?php

use Faker\Generator as Faker;


$factory->define(App\User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'position' => $faker->jobTitle,
        'password' => bcrypt(random_int(100000, 9999999999999)), // secret
        'remember_token' => str_random(10),
    ];
});
