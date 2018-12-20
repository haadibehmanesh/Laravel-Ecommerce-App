<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Invitation extends Model
{
    protected $fillable = [
        'customer_id', 'code', 'status','expire_date',
    ];
}
