<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Score extends Model
{
    protected $fillable = [
        'customer_id', 'value', 'status'
    ];
    public function customer()
    {
        return $this->belongsTo('App\Customer','customer_id');
    }
}
