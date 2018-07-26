<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BiProduct extends Model
{
    public function categories()
    {
        return $this->belongsToMany('App\BiCategory');
    }

    public function scopeMightAlsoLike($query) {
        return $query->inRandomOrder()->take(4);
    }
}
