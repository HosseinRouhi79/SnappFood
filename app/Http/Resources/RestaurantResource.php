<?php

namespace App\Http\Resources;

use App\Models\RestaurantType;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $restaurantType = RestaurantType::where('id',$this->restaurant_type_id)->first();

        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'type'=>$restaurantType->name,
            'addresses'=>[
                'address'=>$this->address,
                'latlng'=>$this->latlng
            ],
            'image'=>$this->image,
            'start'=>$this->start,
            'end'=>$this->end,
            'score'=>$this->score,
        ];
    }
}
