<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    public function order()
    {
        return $this->belongsToMany(Order::class);
    }

    public function restaurant()
    {
        $this->belongsTo(Restaurant::class);
    }
}
