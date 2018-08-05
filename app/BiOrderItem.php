<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BiOrderItem extends Model
{
    protected $table = 'bi_order_items';

    protected $fillable = ['bi_order_id', 'name', 'price', 'quantity', 'total', 'bi_product_id', 'code', 'code_used_count'];

    public function order ()
    {
        return $this->belongsTo('App\BiOrder', 'bi_order_id');
    }
}
