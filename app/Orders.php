<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
