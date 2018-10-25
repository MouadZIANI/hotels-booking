<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $tel
 * @property string $role
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 * @property Booking[] $bookings
 * @property LineBooking[] $lineBookings
 */
class User extends Authenticatable
{
    use Notifiable;
    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'tel', 'role', 'remember_token', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function bookings()
    {
        return $this->hasMany('App\Booking', 'client_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lineBookings()
    {
        return $this->hasMany('App\LineBooking', 'client_id');
    }
}
