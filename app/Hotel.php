<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $city_id
 * @property string $name
 * @property string $tel
 * @property int $stars
 * @property string $zip_code
 * @property string $adress
 * @property string $description
 * @property boolean $etat
 * @property string $created_at
 * @property string $updated_at
 * @property City $city
 * @property HotelsImage[] $hotelsImages
 * @property RoomType[] $roomTypes
 */
class Hotel extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['city_id', 'name', 'tel', 'stars', 'zip_code', 'adress', 'description', 'etat', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city()
    {
        return $this->belongsTo('App\City');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hotelsImages()
    {
        return $this->hasMany('App\HotelsImage');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function roomTypes()
    {
        return $this->hasMany('App\RoomType');
    }
}
