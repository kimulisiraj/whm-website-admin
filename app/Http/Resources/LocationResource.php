<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
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
            'id'            => $this->id,
            'banner'        => asset($this->banner_image),
            'pastors_image' => asset($this->pastors_image),
            'pastors_name'  => $this->pastors_name,
            'pastors_level' => $this->pastors_level,
            'location_name' => $this->location_name,
            'address'       => $this->address,
            'description'   => $this->description
        ];
    }
}
