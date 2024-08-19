<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;



class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public $timestamps = false;
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the JWT identifier.
     *
     * @return int
     */
    public function getJWTIdentifier()
    {
        return $this->id;
    }

    /**
     * Get the JWT custom claims.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return []; // You can add custom claims here if needed
    }

}