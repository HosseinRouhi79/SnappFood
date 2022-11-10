<?php

namespace App\Http\Resources;

use App\Models\Food;
use App\Models\FoodType;
use App\Models\Restaurant;
use Illuminate\Http\Resources\Json\JsonResource;

class FoodResource extends JsonResource
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
        $foods = Food::where('restaurant_id',$this->id)->get();
        $ids = Food::where('restaurant_id',$this->id)->get('food_type_id');
$food_type = $ids->first()->food_type_id;
$type_name = FoodType::where('id',$food_type)->first();
        return [
            'categories'=>[
              'id'=>$food_type,
                'title'=>$type_name->name,
                'foods'=>$foods
            ],

        ];
    }
}
