<?php

use Illuminate\Database\Seeder;
use App\EmergencyContact;

class EmergencyContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 
        $e = new EmergencyContact;
        $e->name='Max';
        $e->phone_number='201-886-0269';
        $e->animal_id=1;
        $e->save();

    }
}
