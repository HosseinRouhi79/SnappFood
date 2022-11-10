<?php

namespace App\Http\Resources;

use App\Models\Restaurant;
use App\Models\RestaurantType;
use Illuminate\Http\Resources\Json\JsonResource;

class DaysResource extends JsonResource
{
    public function __construct(Restaurant $restaurant)
    {
        parent::__construct($restaurant);
    }
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
            'schedule'=>[
                'sunday'=>[
                    'start'=>$this->start,
                    'end'=>$this->end
                ],
                'monday'=>[
                    'start'=>$this->start,
                    'end'=>$this->end
                ],
                'tuesday'=>[
                    'start'=>$this->start,
                    'end'=>$this->end
                ],
                'wednesday'=>[
                    'start'=>$this->start,
                    'end'=>$this->end
                ],
                'thursday'=>[
                    'start'=>$this->start,
                    'end'=>$this->end
                ],
                'friday'=>null
            ],

            'score'=>$this->score,
        ];
    }
}
