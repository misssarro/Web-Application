<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pokemon;
use Faker\Generator as Faker;

$factory->define(Pokemon::class, function (Faker $faker) {
    return [
        //
        'name'=> $faker->firstName(),
        'HP' =>$faker->numberBetween(10,100),
        'type'=>$faker->randomElement(['fire','water','grass','electric']),
        'trainer_id'=>App\Trainer::inRandomOrder()->first()->id,
    ];
});
