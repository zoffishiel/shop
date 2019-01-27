<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Collections extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
          "product" => $this->product()->first()
        ];
    }
}
