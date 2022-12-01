<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Response
 *
 * @property int $id
 * @property string $response
 * @property int $restaurant_id
 * @property int $comment_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Comment $comment
 * @method static \Illuminate\Database\Eloquent\Builder|Response newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Response newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Response query()
 * @method static \Illuminate\Database\Eloquent\Builder|Response whereCommentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Response whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Response whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Response whereResponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Response whereRestaurantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Response whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Response extends Model
{
    use HasFactory;
    protected $fillable = [
      'comment_id','restaurant_id','response'
    ];

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
