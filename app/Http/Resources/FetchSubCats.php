<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FetchSubCats extends JsonResource
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
        'cat_id' => $this->id,
        'name' => $this->name,
        'parent_id' => $this->parent_id,
        'sort_order' => $this->sort_order,
        'slug' => $this->slug,

       ];
    }
}
