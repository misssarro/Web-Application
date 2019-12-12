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
        $posts= factory(App\Post::class,50)->create();
        $tags=factory(App\Tag::class,50)->create();

        App\Post::all()->each(function ($post) use ($tags){
            $post->tags()->attach(
                $tags->random(rand(3,3))->pluck('id')->toArray()
            );
        });
    }
}
