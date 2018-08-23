<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BiCustomer extends Model
{
    protected $table = 'bi_customers';
    protected $fillable = [
        'customer_id',
    ];

    public function c_groups()
    {
        return $this->belongsToMany('App\BiCGroup');
    }

    public function customer(){

        return $this->belongsTo('App\Customer');
    }
}
