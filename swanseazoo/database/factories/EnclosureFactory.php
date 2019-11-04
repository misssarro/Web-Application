<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Enclosure;
use Faker\Generator as Faker;

$factory->define(Enclosure::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->name,
    ];
});
