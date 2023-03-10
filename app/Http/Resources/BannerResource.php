<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BannerResource extends JsonResource
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
            'phase'       => $this->phase,
            'link'        => $this->link,
            'description' => $this->description,
            'link_text'   => $this->link_text,
        ];
    }
}
