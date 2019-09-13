<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Contacts;

$factory->define(Contacts::class, function () {
    return [
        'body' => '<p>Введите контактные данные</p>',
        'yCoordinate' => '55.757972',
        'xCoordinate' => '37.611203',
        'adress' => 'Москва, Тверская улица, дом 7', 

    ];
});
