<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'Foods';
    // Relazione One to Many con Restaurant

    protected $fillable = [
        'name',
        'img',
        'descriptions',
        'ingrediants',
        'price',
        'visible'
    ];

    public function restaurant(){
        return $this->belongsTo('App\Restaurant');
    }

    // Relazione Many to Many con Order

    public function orders(){
        return $this->belongsToMany('App\Order');
    }
}
