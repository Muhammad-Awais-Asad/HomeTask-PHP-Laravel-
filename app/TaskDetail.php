<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskDetail extends Model
{
    public function userprofile(){
        return $this->belongsTo('App\UserProfile');
    }
}
