<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Feedback::class, function (Faker $faker) {
    return [
        'name'    => $faker->name,
        'email'   => $faker->email,
        'phone'   => $faker->phoneNumber,
        'message' => $faker->paragraph,
    ];
});
