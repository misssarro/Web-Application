<?php

use Illuminate\Database\Seeder;
use App\Keeper;
class KeeperTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $k= new Keeper;
        $k->name='Lisa';
        $k->save();

        $k->animals()->attach(1);
        $k->animals()->attach(12);
    }
}
