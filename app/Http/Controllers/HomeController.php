<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ConfirmedTasks;
use App\CompletedTask;
use App\UserProfile;
use App\TaskDetail;
use App\Biodata;
use App\Tasks;
use App\User;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        return view('home');
    }

    public function profile()
    {
        $u = auth()->user()->id;
        $users = UserProfile::where('user_id_fk', $u)->first();
        return view('/tasker.profile', compact('users'));
    }

    public function mjobs(){
        $users = User::all();
        $tasks = TaskDetail::all();
        $datas = Biodata::all();
        $jobs = Tasks::all();
        return view('/tasker.myjobs', compact('users', 'tasks', 'datas', 'jobs'));
    }

    public function confirmedJobs(){
        $ct = ConfirmedTasks::all();
        foreach($ct as $c){
            if($c->tasker_id_fk == auth()->user()->id){
                $data = DB::select("select * from confirmed_tasks where tasker_id_fk = '$c->tasker_id_fk'");
                $td = TaskDetail::all();
                $users = User::all();
                return view('/tasker/confirmedjobs', compact('td', 'data', 'users'));
            }else{
                $data = null;
            }
        }
        $data = null;
        return view('/tasker/confirmedjobs', compact('data'));
    }

    public function cjobs(){
        $ct = CompletedTask::all();
        foreach($ct as $c){
            if($c->tasker_id_fk == auth()->user()->id){
                $data = DB::select("select * from completed_tasks where tasker_id_fk = '$c->tasker_id_fk'");
                $td = TaskDetail::all();
                $users = User::all();
                return view('/tasker.completedjobs', compact('td', 'data', 'users'));
            }else{
                $data = null;
            }
        }
        $data = null;
        return view('/tasker.completedjobs', compact('data'));
    }

    public function notifications($id){
        return view('/tasker/notifications');
    }
}
