<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\HookahPlace;
use Illuminate\Support\Str;

$factory->define(HookahPlace::class, function (Faker $faker) {
    return [
        'name' => Str::random(10)
    ];
});
