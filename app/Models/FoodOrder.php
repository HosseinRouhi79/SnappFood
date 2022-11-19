<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodOrder extends Model
{
    protected $fillable = [
      'food_id',
      'order_id'
    ];
    use HasFactory;
}