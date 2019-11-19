<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $posts= factory(App\Post::class,3)->create();
        $tags=factory(App\Tag::class,3)->create();

        App\Post::all()->each(function ($post) use ($tags){
            $post->tags()->attach(
                $tags->random(rand(1,3))->pluck('id')->toArray()
            );
        });
    }
}
