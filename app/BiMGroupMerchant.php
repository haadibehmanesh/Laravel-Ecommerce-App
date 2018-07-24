<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BiMGroupMerchant extends Model
{
    protected $table = 'bi_m_group_bi_merchant';

    protected $fillable = ['bi_merchant_id', 'bi_m_group_id'];
}
