<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enclosure extends Model
{
    //
    public function Animals()
    {
        return $this->hasMany('App\Animal');
    }
}
