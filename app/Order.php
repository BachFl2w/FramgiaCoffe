<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
