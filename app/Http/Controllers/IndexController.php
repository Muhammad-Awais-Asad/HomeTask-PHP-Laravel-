<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use DB;
use App\Tasks;
use App\Biodata;
use App\TaskDetail;

class IndexController extends Controller
{
    public function index(){
    	if (Auth::check()){
    		return redirect('/client/profile');
    	}
    	$users = User::all();
        //$tasks = Tasks::all('tasker_id_fk');
        //$tasks = DB::select('select `tasker_id_fk` from `tasks`');
        $tasks = Tasks::all();
    	$jobs = TaskDetail::all();
    	$datas = Biodata::all();
    	return view('/index', compact('jobs', 'datas', 'users', 'tasks'));
    }
}
