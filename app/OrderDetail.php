<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'order_details';

    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }

    public function orderDetailTopings()
    {
        return $this->hasMany(OrderDetailToping::class);
    }

    public function sizes()
    {
        return $this->belongsTo(Size::class);
    }
}
