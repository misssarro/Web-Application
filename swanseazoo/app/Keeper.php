<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keeper extends Model
{
    //
    public function animals()
    {
        return $this->belongsToMany('App\Animal');
    }
}
