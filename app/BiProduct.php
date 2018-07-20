<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BiProduct extends Model
{
    public function categories()
    {
        return $this->belongsToMany('App\BiCategory');
    }
}
