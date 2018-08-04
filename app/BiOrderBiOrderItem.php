<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BiOrderBiOrderItem extends Model
{
    Protected $table = "bi_order_bi_order_item";
    protected $fillable = ['bi_order_id', 'bi_order_item_id'];
}
