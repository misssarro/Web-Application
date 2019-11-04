<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    //
    public function trainer()
    {
        return $this->belongsTo('App\Trainer');
    }
}
