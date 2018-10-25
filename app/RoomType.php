<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $hotel_id
 * @property string $name
 * @property float $price_per_night
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @property Hotel $hotel
 * @property Booking[] $bookings
 * @property RoomImage[] $roomImages
 * @property Room[] $rooms
 */
class RoomType extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['hotel_id', 'name', 'price_per_night', 'description', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hotel()
    {
        return $this->belongsTo('App\Hotel');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookings()
    {
        return $this->hasMany('App\Booking');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roomImages()
    {
        return $this->hasMany('App\RoomImage');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rooms()
    {
        return $this->hasMany('App\Room');
    }
}
