<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>(string)$this->id,
            'attributes'=>[
                'title'=>$this->title,
                'address'=>$this->address,
                'longitude'=>$this->longitude,
                'latitude'=>$this->latitude,
            ],
            'relationships'=>[
                'user_id'=>$this->user->id,
            ]
        ];
    }
}
