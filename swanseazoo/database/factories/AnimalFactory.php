<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Animal;
use App\Enclosure;


use Faker\Generator as Faker;

$factory->define(Animal::class, function (Faker $faker) {
    return [
        //
        'name' =>$faker->firstName,
        'HP' =>$faker->date,
        'type' => $faker->randomElement(['cat','dog','water','fire']),
        'enclosure_id' => function (){
            return factory(App\Enclosure::class)->create()->id;
        }
    ];
});