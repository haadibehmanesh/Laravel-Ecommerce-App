<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BiCGroupCustomer extends Model
{
    protected $table = 'bi_c_group_bi_customer';

    protected $fillable = ['bi_customer_id', 'bi_c_group_id'];
}
