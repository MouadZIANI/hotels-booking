<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $user_id
 * @property int $post_id
 * @property int $count_likes
 * @property int $count_dislikes
 * @property string $created_at
 * @property string $updated_at
 * @property Post $post
 * @property User $user
 */
class LikedPost extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'post_id', 'count_likes', 'count_dislikes', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function posts()
    {
        return $this->belongsTo('App\Post');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
