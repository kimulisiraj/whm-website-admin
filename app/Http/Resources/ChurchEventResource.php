<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ChurchEventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'image'       => $this->image,
            'title'       => $this->title,
            'description' => $this->description,
            'link'        => $this->link,
            'link_text'   => $this->link_text,
            'happens'   => $this->starts_at,
        ];
    }
}
