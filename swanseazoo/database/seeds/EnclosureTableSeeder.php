<?php

use Illuminate\Database\Seeder;
use App\Enclosure;

class EnclosureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $e= new Enclosure;
        $e->name = 'Central Enclosure';
        $e->save();
    }
}
