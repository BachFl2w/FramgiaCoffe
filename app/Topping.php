<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{
    protected $table = 'toppings';

    public function orderDetails()
    {
        return $this->belongsToMany(OrderDetail::class);
    }
}
