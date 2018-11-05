<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table = 'images';

    public function products()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
