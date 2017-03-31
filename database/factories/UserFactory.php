<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    $gender=$faker->randomElement(['male', 'female']);
    return [
        'name' => $faker->name($gender),
        'email' => $faker->safeEmail,
        'username' => $faker->userName,
        'phone' => $faker->phoneNumber,
        'gender' =>$gender ,
        'address' => $faker->address,
        'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'password' => bcrypt('secret')
    ];
});
