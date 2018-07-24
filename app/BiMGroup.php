<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BiMGroup extends Model
{
    protected $table = 'bi_m_groups';

    public function merchants() 
    {
        return $this->belongsToMany('App\BiMerchant');
    }   
}
