<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'id'=>$this->id,
            'restaurant'=>[
                'title'=>$this->restaurant->name,
                'restaurant'=>$this->restaurant_id,
                'foods'=>$this->food->map(function ($user) {
                    return collect($user->toArray())
                        ->only(['id','pivot','name','price'])
                        ->all();
                }),
                'image'=>null
            ]
        ];
    }
}
