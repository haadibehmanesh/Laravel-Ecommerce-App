<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BiCoupon extends Model
{
    public static function findByCode($code)
    {
        return self::where('code', $code)->first();
    }

    public function categories()
    {
        return $this->belongsToMany('App\BiCategory');
    }
    
    public function discount($total)
    {
        if ($this->type == 'fixed') {
            return $this->value;
        } elseif ($this->type == 'percent') {
            return round(($this->percent_off / 100) * $total);
        } else {
            return 0;
        }
    }
}
