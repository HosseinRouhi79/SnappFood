<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    use HasFactory;
}
