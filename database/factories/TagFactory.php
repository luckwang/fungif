<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Tag::class, function (Faker $faker) {
    $time = $faker->dateTime;
    return [
        'name' => $faker->name,
        'created_at' => $time,
        'updated_at' => $time
    ];
});
