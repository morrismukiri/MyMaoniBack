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

$factory->define(App\Models\Poll::class, function (Faker\Generator $faker) {

    return [
        'title' => $faker->sentence,
        'description' => $faker->text,
        'categoryId' => $faker->numberBetween(0,10), //$faker->randomDigitNotNull,
        'openTime' => $faker->dateTime,
        'closeTime' => $faker->dateTime,
        'targetGroup' => $faker->randomDigitNotNull,
        'type' => $faker->randomElement(['open','closed']),
        'userId' => $faker->numberBetween(1,10)
    ];
});
