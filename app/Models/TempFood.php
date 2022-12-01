<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TempFood
 *
 * @property int $id
 * @property int $food_id
 * @property int $user_id
 * @property int $count
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TempFood newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TempFood newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TempFood query()
 * @method static \Illuminate\Database\Eloquent\Builder|TempFood whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TempFood whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TempFood whereFoodId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TempFood whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TempFood whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TempFood whereUserId($value)
 * @mixin \Eloquent
 */
class TempFood extends Model
{
    protected $fillable = [
      'user_id','food_id','count'
    ];
    use HasFactory;
}
