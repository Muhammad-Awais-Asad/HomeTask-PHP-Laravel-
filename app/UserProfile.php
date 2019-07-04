<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $fillable = [
        'fname', 'lname', 'email', 'password',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function taskdetail(){
    	return $this->hasMany('App\TaskDetail');
    }

    public function tasks(){
    	return $this->hasMany('App\Tasks');
    }
}
