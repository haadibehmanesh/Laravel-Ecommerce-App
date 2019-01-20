<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CustomerBiCoupon extends Model
{
    protected $table = 'customer_bi_coupon';

    protected $fillable = ['bi_coupon_id', 'customer_id'];
}
