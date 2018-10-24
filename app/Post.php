<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property int $count_likes
 * @property int $count_dislikes
 * @property string $img
 * @property string $created_at
 * @property string $updated_at
 * @property LikedPost[] $likedPosts
 */
class Post extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'count_likes', 'count_dislikes', 'img', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function likedPosts()
    {
        return $this->hasMany('App\LikedPost');
    }
}
