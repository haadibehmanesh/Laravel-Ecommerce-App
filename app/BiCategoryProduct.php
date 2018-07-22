<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BiCategoryProduct extends Model
{
    protected $table = 'bi_category_bi_product';

    protected $fillable = ['bi_product_id', 'bi_category_id'];
}
