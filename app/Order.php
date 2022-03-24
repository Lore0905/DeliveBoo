<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_name',
        'cutomer_email',
        'total_amount'
    ];

    // Relazione Many to Many con Food
    public function foods(){
        return $this->belongsToMany('App\Food');
    }
}
