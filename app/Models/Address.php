<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
      'title','address','longitude','latitude','user_id'
    ];

    public function user()
    {
      return  $this->belongsTo(User::class);
    }
    use HasFactory;
//    public $timestamps = false;
}

