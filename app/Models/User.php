<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function cardOrder()
    {
        return $this->hasMany(cardOrder::class);
    }


    public function address()
    {
        return $this->hasMany(address::class);
    }

    public function profile()
    {
        return $this->hasOne(profile::class);
    }

    public function emails()
    {
        return $this->hasMany(email::class);
    }


    public function phones()
    {
        return $this->hasMany(phone::class);
    }


    public function websites()
    {
        return $this->hasMany(website::class);
    }
}
