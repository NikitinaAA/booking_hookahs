<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Hookah;
use App\HookahPlace;

$factory->define(Hookah::class, function (Faker $faker) {
    return [
        'hookah_place_id' => HookahPlace::all()->random()->id,
        'name' => Str::random(10),
        'tube_amount' => rand(1, 4)
    ];
});
