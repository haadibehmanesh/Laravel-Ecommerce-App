<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Checkout extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       // return parent::toArray($request);
       return [
        'message' => $this->message,
       // 'name' => $this->name,
        //'price' => $this->price
       ];
    }
}
