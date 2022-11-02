<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantType extends Model
{
    protected $fillable = [
      'name'
    ];

    public function foodType()
    {
        return $this->hasMany(FoodType::class);
    }

    use HasFactory;
}
