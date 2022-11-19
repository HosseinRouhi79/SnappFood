<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempFood extends Model
{
    protected $fillable = [
      'user_id','food_id','count'
    ];
    use HasFactory;
}
