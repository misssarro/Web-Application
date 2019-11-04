<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    //
    public function emergencyContact()
    {
        return $this->hasOne('App\EmergencyContact');

    }
    public function enclosure()
    {
        return $this->belongsTo('App\Enclosure');
    }
    public function keepers()
    {
        return $this->belongsToMany('App\Keeper');
    }
}
