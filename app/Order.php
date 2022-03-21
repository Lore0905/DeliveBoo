<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Relazione Many to Many con Food

    public function foods(){
        return $this->belongsToMany('App\Food');
    }
}
