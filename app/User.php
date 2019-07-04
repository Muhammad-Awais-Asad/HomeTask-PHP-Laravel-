<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'lname', 'email', 'password', 'user_type', 'verifyToken',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function userprofiles(){
        return $this->belongsTo('App\UserProfile');
    }

    public function userskills(){
        return $this->belongsTo('App\UserSkills');
    }

    public function userccinfos(){
        return $this->belongsTo('App\UserCCInfo');
    }

    public function biodata(){
        return $this->belongsTo('App\Biodata');
    }
}
