<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Search extends JsonResource
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
            'discount' => $this->discount,
            'description' => $this->description,
            'parent_id' => $this->parent_id,
            'bi_merchant_id' => $this->bi_merchant_id,
            'quantity' => $this->quantity,
            'image' => $this->image,
            'gallery' => $this->gallery,
            'location' =>$this->location,
           
        
           ];
    }
}