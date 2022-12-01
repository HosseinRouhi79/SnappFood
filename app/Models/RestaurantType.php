<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RestaurantType
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Restaurant $Restaurant
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\FoodType[] $foodType
 * @property-read int|null $food_type_count
 * @method static \Database\Factories\RestaurantTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantType query()
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RestaurantType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class RestaurantType extends Model
{
    protected $fillable = [
      'name'
    ];

    public function foodType()
    {
        return $this->hasMany(FoodType::class);
    }

    public function Restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    use HasFactory;
}
