<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BiOrderStatus extends Model
{
    protected $table = 'bi_order_status';

    protected $fillable = ['name'];

    public function Orders ()
    {
        return $this->hasMany('App\BiOrder');
    }
}
