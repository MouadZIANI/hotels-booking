<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $room_type_id
 * @property string $number
 * @property string $created_at
 * @property string $updated_at
 * @property RoomType $roomType
 */
class Room extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['room_type_id', 'number', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function roomType()
    {
        return $this->belongsTo('App\RoomType');
    }
}
