<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $client_id
 * @property int $room_type_id
 * @property string $start_date
 * @property string $end_date
 * @property int $nbr_rooms
 * @property boolean $etat
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property RoomType $roomType
 */
class Booking extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['client_id', 'room_type_id', 'start_date', 'end_date', 'nbr_rooms', 'etat', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'client_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function roomType()
    {
        return $this->belongsTo('App\RoomType');
    }
}
