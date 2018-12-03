<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';

    protected $dates = ['deleted_at'];

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->withTrashed();
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
