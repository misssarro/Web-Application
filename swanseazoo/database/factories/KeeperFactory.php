<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Keeper;
use Faker\Generator as Faker;

$factory->define(Keeper::class, function (Faker $faker) {
    return [
        //
        'name' =>$faker->firstName(),
    ];
});
