<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = 'order_details';

    public function products()
    {
        return $this->belongsTo(Products::class);
    }

    public function orders()
    {
        return $this->belongsTo(Orders::class);
    }

    public function orderDetailTopings()
    {
        return $this->hasMany(OrderDetailTopings::class);
    }

    public function sizes()
    {
        return $this->belongsTo(Sizes::class);
    }
}
