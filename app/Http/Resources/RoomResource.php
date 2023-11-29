<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RoomResource extends JsonResource
{
    /**
     * Transform the resource into an arrays.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'hotel_id' => $this->hotel_id,
            'title' => $this->title,
            'type' => $this->type,
            'capacity' => $this->capacity,
            'facility' => $this->facility,
            'price' => $this->price,
            'availability' => $this->availability,
            'image_url' => $this->image_url
        ];
    }
}
