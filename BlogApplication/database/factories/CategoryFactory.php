<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->word,
        'user_id' => function(){
            return factory(App\User::class)->create()->id;
        }
    ];
});
