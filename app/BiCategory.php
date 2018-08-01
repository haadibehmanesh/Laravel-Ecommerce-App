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
    public function parent()
    {
        return $this->belongsTo('App\BiCategory', 'parent_id');
    }
    public function children()
    {
        return $this->hasMany('App\BiCategory', 'parent_id');
    }
    
}
