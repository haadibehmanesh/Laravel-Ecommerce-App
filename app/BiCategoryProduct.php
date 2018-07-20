<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BiCategoryProduct extends Model
{
    protected $tabele = 'bi_category_bi_product';

    protected $fillable = ['product_id', 'category_id'];
}
