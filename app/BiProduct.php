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
}
