<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sizes extends Model
{
    protected $table = 'sizes';

    public function orderDetails()
    {
        return $this->hasMany(OrderDetails::class);
    }
}
