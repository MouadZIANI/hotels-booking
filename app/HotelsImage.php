<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $hotel_id
 * @property string $image
 * @property string $created_at
 * @property string $updated_at
 * @property Hotel $hotel
 */
class HotelsImage extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['hotel_id', 'image', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }
}
