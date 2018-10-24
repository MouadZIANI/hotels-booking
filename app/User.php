<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 */
class User extends Authenticatable
{
    use Notifiable;
    
    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'remember_token', 'created_at', 'updated_at'];
}
