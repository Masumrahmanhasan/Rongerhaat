<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Model\SoftwareAuth::class, function (Faker $faker) {
    return [
        // 'access_code' => $faker->unique()->numberBetween($min = 10000000, $max = 99999999),
        'role' => 'Admin',
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $faker->unique()->phoneNumber,
        'username' => $faker->unique()->userName,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'status' => 1,
    ];
});
