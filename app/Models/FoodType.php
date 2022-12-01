<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FoodType
 *
 * @property int $id
 * @property int $restaurant_type_id
 * @property string $name
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $discount
 * @property-read \App\Models\RestaurantType $restaurantType
 * @method static \Database\Factories\FoodTypeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|FoodType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FoodType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FoodType query()
 * @method static \Illuminate\Database\Eloquent\Builder|FoodType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FoodType whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FoodType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FoodType whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FoodType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FoodType whereRestaurantTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FoodType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
