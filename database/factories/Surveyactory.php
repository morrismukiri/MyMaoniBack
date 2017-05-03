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

$factory->define(App\Models\Survey::class, function (Faker\Generator $faker) {

    return [
        'title' => $faker->sentence,
        'description' => $faker->text,
        'openTime' => $faker->dateTime,
        'closeTime' => $faker->dateTime,
        'targetGroup' => $faker->randomDigitNotNull,
        'userId' => $faker->numberBetween(1,10)
    ];
});
