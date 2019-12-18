<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        //
        /*'name' => function (){
            return factory(App\User::class)->create()->name;
        },*/
        /*'email' => function (){
            return factory(App\User::class)->create()->email;
        },*/
        'comment_content'=>$faker->paragraph,
        'post_id' => function(){
            return factory(App\Post::class)->create()->id;
        },
        'user_id' => function(){
            return factory(App\User::class)->create()->id;
        },
    ];
});
