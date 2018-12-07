<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Wallet extends Model
{
    protected $table = 'wallets';

    protected $fillable = ['customer_id','balance','status','ref_id','tracking_code'];
    
    public function customer()
    {
        return $this->belongsTo('App\Customer','customer_id');
    }
}
