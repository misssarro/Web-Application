<?php

use Illuminate\Database\Seeder;
use App\Profile;
class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /*$p = new Profile;
        $p->user_id=1;
        $p->tittle='Cool Title';
        $p->description='Description';
        $p->url='www';
        $p->save();*/
        factory(App\Profile::class,1)->make();

    }
}
