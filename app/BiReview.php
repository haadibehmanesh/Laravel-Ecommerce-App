<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BiReview extends Model
{
    protected $fillable = ['bi_product_id', 'customer_id', 'author','text','rating','status'];

    public function product()
    {
        return $this->belongsTo('App\BiReview','bi_product_id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer','customer_id');
    }
}
