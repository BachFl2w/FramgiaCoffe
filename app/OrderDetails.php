<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = 'order_details';

    public function products()
    {
        return $this->belongsTo('App\Products', 'product_id', 'id');
    }

    public function orders()
    {
        return $this->belongsTo(Orders::class, 'order_id', 'id');
    }

    public function orderDetailTopings()
    {
        return $this->hasMany(OrderDetailTopings::class, 'order_detail_id', 'id');
    }

    public function sizes()
    {
        return $this->belongsTo(Sizes::class, 'size_id', 'id');
    }
}
