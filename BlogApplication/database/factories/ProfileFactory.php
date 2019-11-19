<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;

$factory->define(Profile::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->firstName,
        'profile_pic'=>$faker->imageUrl($width = 640, $height = 480),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
});
