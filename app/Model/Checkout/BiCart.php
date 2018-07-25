<?php

namespace App\Model\Checkout;

use Illuminate\Database\Eloquent\Model;

class BiCart extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'bi_cart';

    public function __construct() 
    {
        $date = new \DateTime();
        $date->modify('-1 hours');
        $formatted_date = $date->format('Y-m-d H:i:s');
        
        $this->where(function ($query) {
            $query->where('api_id', '>', 0)->orWhere('customer_id', 0);
        })->where('created_at', '<', $formatted_date)->delete();
    } 
    
}
