<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array('name', 'remember_token', 'created_at', 'updated_at', 'avatar', 'gender');

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function givenCompliments() {
        return $this->hasMany('App\Compliment', 'from_id');
    }

    public function receivedCompliments() {
        return $this->hasMany('App\Compliment', 'to_id');
    }
}
