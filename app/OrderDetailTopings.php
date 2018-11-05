<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetailTopings extends Model
{
    protected $table = 'order_detail_toping';

    public function orderDetails()
    {
        return $this->belongsTo(OrderDetails::class, 'order_detail_id', 'id');
    }

    public function topings()
    {
        return $this->belongsTo(Toppings::class, 'topping_id', 'id');
    }
}
