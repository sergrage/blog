<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\About;

$factory->define(About::class, function () {
    return [
        'body' => '<p>Введите данные</p>',
    ];
});
