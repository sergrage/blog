<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Resume;
use Faker\Generator as Faker;

$factory->define(Resume::class, function (Faker $faker) {
    return [
        'body' => '<p>Введите данные</p>',
        'views' => 0,
    ];
});
