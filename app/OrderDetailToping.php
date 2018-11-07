<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetailToping extends Model
{
    protected $table = 'order_detail_toping';

    public function orderDetails()
    {
        return $this->belongsTo(OrderDetails::class);
    }

    public function topings()
    {
        return $this->belongsTo(Toppings::class);
    }
}
