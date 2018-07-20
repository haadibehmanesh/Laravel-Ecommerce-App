<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BiCategory extends Model
{
    Protected $table = "bi_categories";

    public function products()
    {
        return $this->belongsToMany('App\BiProduct');
    }
    
}
