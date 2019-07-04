<?php

namespace App;

use App\UserPrfile;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    public function userprofile(){
    	return $this->belongsTo('App\UserProfile');
    }
}
