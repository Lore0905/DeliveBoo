<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    // Relazione Many to Many con Restaurant

    public function restaurants(){
        return $this->belongsToMany('App\Restaurant');
    }
}
