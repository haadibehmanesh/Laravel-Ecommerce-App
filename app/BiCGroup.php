<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BiCGroup extends Model
{
    protected $table = 'bi_c_groups';

    public function customers() 
    {
        return $this->belongsToMany('App\BiCustomer');
    }
}
