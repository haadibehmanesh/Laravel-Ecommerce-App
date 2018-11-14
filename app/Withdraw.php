<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Withdraw extends Model
{
    protected $fillable = ['bi_merchant_id', 'type', 'quantity','status'];
   
    public function merchant()
    {
        return $this->belongsTo('App\Withdraw','bi_merchant_id');
    }
}
