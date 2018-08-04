<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BiOrder extends Model
{
    protected $table = 'bi_orders';

    protected $fillable = ['invoice_no', 'total', 'order_code'];
}
