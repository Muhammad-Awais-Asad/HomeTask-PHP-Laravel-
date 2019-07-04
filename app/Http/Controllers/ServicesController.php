<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use App\Tasks;
use App\Biodata;
use App\TaskDetail;
use App\UserProfile;
use App\CompletedTask;
use App\ConfirmedTasks;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function services(){
    	if (Auth::check()){
            return redirect('/client/profile');
        }
        
        $ct = ConfirmedTasks::all();
        $cmpt = CompletedTask::all();
        $users = User::all();
        $tasks = Tasks::all();
        $jobs = TaskDetail::orderBy('created_at', 'desc')->paginate(5);
        $a = TaskDetail::all();
        $datas = Biodata::all();

        $x = 0;
        foreach($a as $aa){
            $x = 0; 
            foreach($ct as $t){
                if($aa->id == $t->task_id_fk){
                    $x++;
                }
            }
        }

        return view('/services', compact('jobs', 'datas', 'users', 'tasks', 'ct', 'x', 'cmpt'));
    }
}
