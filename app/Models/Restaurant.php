<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Restaurant
 *
 * @property int $id
 * @property int $user_id
 * @property int $restaurant_type_id
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $latlng
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $start
 * @property string $end
 * @property float $score
 * @property-read \App\Models\RestaurantType|null $restaurantType
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant query()
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereLatlng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereRestaurantTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Restaurant whereUserId($value)
 * @mixin \Eloquent
 */
class Restaurant extends Model
{
    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function food()
    {
        $this->hasMany(Food::class);
    }

    public function restaurantType()
    {
       return $this->hasOne(RestaurantType::class);
    }
    use HasFactory;
}
