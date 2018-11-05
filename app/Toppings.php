<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Toppings extends Model
{
    protected $table = 'toppings';

    public function orderDetailToppings()
    {
        return $this->belongsToMany(OrderDetails::class);
    }
}
