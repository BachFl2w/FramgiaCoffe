<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    public function images()
    {
        $this->hasMany(Images::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedbacks::class);
    }
}
