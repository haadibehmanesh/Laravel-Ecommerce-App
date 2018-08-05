<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BiOrderItem extends Model
{
    protected $table = 'bi_order_items';

    protected $fillable = ['name', 'price', 'quantity', 'total', 'bi_product_id', 'code'];

    public function order ()
    {
        return $this->belongsTo('App\BiOrder', 'bi_order_id');
    }
}
