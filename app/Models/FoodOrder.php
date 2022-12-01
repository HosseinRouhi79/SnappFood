<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\FoodOrder
 *
 * @method static \Illuminate\Database\Eloquent\Builder|FoodOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FoodOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FoodOrder query()
 * @mixin \Eloquent
 */
class FoodOrder extends Model
{
    protected $fillable = [
      'food_id',
      'order_id'
    ];
    use HasFactory;
}
