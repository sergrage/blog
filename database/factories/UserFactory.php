<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\User;
use Illuminate\Support\Facades\Hash;

$factory->define(User::class, function () {
    return [
        'name' => env('ROOT_NAME'),
        'email' => env('ROOT_EMAIL'),
        'email_verified_at' => now(),
        'password' => Hash::make(env('ROOT_PASSWORD')), 
        'remember_token' => Str::random(10),
        'root' => 1,
    ];
});
