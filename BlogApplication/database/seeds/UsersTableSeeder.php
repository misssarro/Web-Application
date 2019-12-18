<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user=[
            [
                'name' =>'Admin',
                'email' =>'admin@gmail.com',
                'isAdmin'=>'1',
                'password'=>bcrypt('123456'),
            ]
        ];
       foreach ($user as $key=>$value){
           User::create($value);
       }
            // factory(App\User::class,3)->create();
    }
}
