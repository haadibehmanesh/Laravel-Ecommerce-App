<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BiCustomer extends Model
{
    protected $table = 'bi_customers';

    public function c_groups()
    {
        return $this->belongsToMany('App\BiCGroup');
    }
}
