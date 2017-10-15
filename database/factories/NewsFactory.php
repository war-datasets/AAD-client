<?php

use App\User;
use Faker\Generator as Faker;

$factory->define(App\News::class, function (Faker $faker) {
    return [
        'author_id' => function () {
            return factory(User::class)->create()->id;
        },
        'image_path' => 'path/to/image.jpg',
        'title' => $faker->word,
        'text' => $faker->paragraph
    ];
});
