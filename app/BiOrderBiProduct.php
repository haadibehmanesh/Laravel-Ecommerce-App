<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BiOrderBiProduct extends Model
{
    Protected $table = "bi_order_bi_product";
    protected $fillable = ['bi_order_id', 'bi_product_id', 'quantity', 'name', 'price', 'total'];
}
