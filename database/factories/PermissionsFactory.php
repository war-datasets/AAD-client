<?php

use Faker\Generator as Faker;

$factory->define(App\Permissions::class, function (Faker $faker) {
    return ['name' => $faker->name];
});
