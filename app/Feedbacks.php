<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedbacks extends Model
{
    protected $table = 'feedbacks';

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function products()
    {
        return $this->belongsTo('App\Products', 'product_id', 'id');
    }
}
