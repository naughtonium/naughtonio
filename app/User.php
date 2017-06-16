<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use \App\UserTraits\WeatherText;

class User extends Authenticatable
{
    use Notifiable, WeatherText;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Strips phone of non numeric characters
     *
     * @param $phone
     */
    public function setPhoneAttribute($phone)
    {
        $this->attributes['phone'] = preg_replace('/[^0-9]/s', '', $phone);
    }
}
