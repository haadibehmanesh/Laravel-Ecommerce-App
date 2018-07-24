<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BiMerchant extends Model
{
    protected $table = 'bi_merchants';

    public function m_groups()
    {
        return $this->belongsToMany('App\BiMGroup');
    }
}
