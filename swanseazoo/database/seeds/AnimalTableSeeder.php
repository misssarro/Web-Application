<?php

use Illuminate\Database\Seeder;
use App\Animal;


class AnimalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       
       /*$a =new Animal;
       $a->name = "Leo";
       $a->HP= 2;
       $a->type='water';
       $a->enclosure_id=1;

       $a->save();*/

       factory(App\Animal::class,50)->create();
    }
}
