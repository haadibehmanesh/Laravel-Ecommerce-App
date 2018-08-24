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

    public function customer(){
        return $this->belongsTo('App\Customer');
    }

    public function biproducts() {
        return $this->hasMany('App\BiProduct');
    }

    public function orderitems() {
        return $this->hasMany('App\BiOrderItem', 'bi_merchant_id');
    }
}
