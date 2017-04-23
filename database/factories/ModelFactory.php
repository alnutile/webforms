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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Alnutile\Webforms\Webform::class, function (Faker\Generator $faker) {

    $default = file_get_contents(__DIR__ . '/../../tests/fixtures/default.json');
    $default = json_decode($default, true);

    return [
        'name' => $faker->name,
        'data' => $default
    ];
});
