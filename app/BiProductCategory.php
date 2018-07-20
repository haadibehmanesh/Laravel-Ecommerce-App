<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BiProductCategory extends Model
{
    protected $tabele = 'bi_product_category';

    protected $fillable = ['product_id', 'category_id'];
}
