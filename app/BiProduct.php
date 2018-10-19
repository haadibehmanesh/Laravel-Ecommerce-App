<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class BiProduct extends Model
{

    use SearchableTrait;

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'bi_products.name' => 10,
            'bi_products.description' => 9,
            'bi_products.location' => 9,
        ],

    ];

    public function categories()
    {
        return $this->belongsToMany('App\BiCategory');
    }

    public function scopeMightAlsoLike($query) {
        return $query->inRandomOrder()->take(4);
    }

    public function bimerchant() {
        return $this->belongsTo('App\BiMerchant', 'bi_merchant_id');
    }

    public function reviews()
    {
        return $this->hasMany('App\BiReview');
    }
    public function parent()
    {
        return $this->belongsTo('App\BiProduct', 'parent_id');
    }
    public function children()
    {
        return $this->hasMany('App\BiProduct', 'parent_id');
    }
    public function orderitems()
    {
        return $this->hasMany('App\BiOrderItem');
    }
    
}
