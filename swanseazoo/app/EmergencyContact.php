<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmergencyContact extends Model
{
    //
    public function animal()
    {
        return $this->belongsTo('App\Animal');
    }
}