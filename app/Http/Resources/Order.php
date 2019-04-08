<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Order extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       return [
        'id' => $this->id,
        'name' => $this->name,
        'price' => $this->price,
        'quantity' => $this->quantity,
        'code' => $this->code,
        'total' => $this->total,
        'code_used_count' => $this->code_used_count,
        'bi_merchant_id' => $this->bi_merchant_id,
        'image' => $this->image,
        'startDate' => $this->startDate,
        'endDate' => $this->endDate,

       ];
    }
}