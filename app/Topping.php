<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topping extends Model
{
    protected $table = 'toppings';

    public function orderDetailToppings()
    {
        return $this->belongsToMany(OrderDetail::class);
    }
}
