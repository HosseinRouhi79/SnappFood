<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id','restaurant_id','status'];

    public function food()
    {
        return $this->belongsToMany(Food::class);
    }
    use HasFactory;
}
