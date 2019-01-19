<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BiCategoryBiCoupon extends Model
{
    protected $table = 'bi_category_bi_coupon';

    protected $fillable = ['bi_coupon_id', 'bi_category_id'];
}
