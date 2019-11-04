s<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EmergencyContact;
use Faker\Generator as Faker;

$factory->define(EmergencyContact::class, function (Faker $faker) {
    return [
        //
        'name'=> $faker->firstName(),
        'phone_number'=>$faker->phoneNumber,
    ];
});
