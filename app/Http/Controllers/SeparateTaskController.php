<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaskDetail;
use App\User;

class SeparateTaskController extends Controller
{
    public function task($id){
    	$task = TaskDetail::find($id);
    	$fn = User::where('id', $task->client_id_fk)->first();
        return view('/task', compact('task', 'fn'));
    }
}
