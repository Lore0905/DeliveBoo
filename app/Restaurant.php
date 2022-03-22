<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'name',
        'address',
        'image',
        'vat',
        'phone_number'
    ];

    // Relazione One to One con User

    public function user(){
        return $this->belongsTo('App\User');
    }

    // Relazione One to Many con Food

    public function foods(){
        return $this->hasMany('App\Food');
    }

    // Relazione Many to Many con Type

    public function types(){
        return $this->belongsToMany('App\Type');
    }


}
