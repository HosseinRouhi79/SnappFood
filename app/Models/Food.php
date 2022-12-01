<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Food
 *
 * @property int $id
 * @property string $name
 * @property string $price
 * @property int $restaurant_id
 * @property int $food_type_id
 * @property string|null $recipe
 * @property string|null $image
 * @property int|null $discount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Order[] $order
 * @property-read int|null $order_count
 * @method static \Illuminate\Database\Eloquent\Builder|Food newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Food newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Food query()
 * @method static \Illuminate\Database\Eloquent\Builder|Food whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Food whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Food whereFoodTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Food whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Food whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Food whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Food wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Food whereRecipe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Food whereRestaurantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Food whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Food extends Model
{
    use HasFactory;

    public function order()
    {
        return $this->belongsToMany(Order::class)->withPivot('count');
    }

    public function restaurant()
    {
        $this->belongsTo(Restaurant::class);
    }
}
