<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodType extends Model
{
    protected $fillable = [
      'name',
        'restaurant_type_id'
    ];

    public function restaurantType()
    {
        return $this->belongsTo(RestaurantType::class);
    }

    use HasFactory;
}
