<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    return [
        //
        'name'=>$faker->word,
        'user_id' => function(){
            return factory(App\User::class)->create()->id;
        }
        
    ];
});
