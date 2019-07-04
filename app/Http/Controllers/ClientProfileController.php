<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Tasks;
use App\Lesson;
use App\Biodata;
use App\TaskDetail;
use App\UserProfile;
use App\CompletedTask;
use App\ConfirmedTasks;
use Illuminate\Http\Request;
use App\Notifications\NewLessonNotification;
use Illuminate\Support\Facades\Notification;
use App\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notifiable;

class ClientProfileController extends Controller
{
    
    public function index(){
        $user = auth()->user()->id;
        $us = Biodata::find($user);
        return view('/client/profile', compact("us"));
    }

    public function uploadedTasks(){
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

        return view('/client/uploadedTasks', compact('jobs', 'datas', 'users', 'tasks', 'ct', 'x', 'cmpt'));
    }

    public function signedTasks(){
        $ct = ConfirmedTasks::all();
        $users = User::all();
        $tasks = Tasks::all();
        $jobs = TaskDetail::orderBy('created_at', 'asc')->paginate(5);
        $datas = Biodata::all();
        $userprofiles = UserProfile::all();
        return view('/client/signedTasks', compact('jobs', 'datas', 'users', 'tasks', 'ct', 'userprofiles'));
    }

    public function applicatedTask($id, $ud){
        foreach(\Auth::user()->unReadNotifications as $notification){
            if($notification->data['lesson']['tasker_id']==$ud && $notification->data['lesson']['job_id']==$id){
                $notification->markAsRead();
            }
        }
        $task = TaskDetail::find($id);
        $fn = User::where('id', $task->client_id_fk)->first();
        $t = DB::select("select * from tasks where task_id_fk='$id' && tasker_id_fk='$ud';");
        foreach($t as $tt){
            $ttt = $tt->id;
        }
        $t = Tasks::find($ttt);
        $at = User::where('id', $t->tasker_id_fk)->first();
        return view('/client/applicatedTask', compact('task', 'fn', 'at', 't'));
    }

    public function acceptedTask($id){
        foreach(\Auth::user()->unReadNotifications as $notification){
            if($notification->data['lesson']['job_id']==$id){
                $notification->markAsRead();
            }
        }
        $task = TaskDetail::find($id);
        $fn = User::where('id', $task->client_id_fk)->first();
        $t = ConfirmedTasks::where('task_id_fk', $id)->first();
        $at = User::where('id', $t->client_id_fk)->first();
        return view('/tasker.confirmedTask', compact('task', 'fn', 'at', 't'));
    }

    /*public function update(Request $request, $id){
        $td = TaskDetail::find($id);
        $td->tasker_name = auth()->user()->fname;
        $saved = $td->save();
        if($saved){
            return redirect('/client/uploadedTasks')->with('success', 'Request has applied for Task.');
        }else{
            return redirect('/client/uploadedTasks')->with('error', 'Request has applied for Task.');
        }
    }*/

    public function saveCompletedTask($id){
        $ct = ConfirmedTasks::where('task_id_fk', $id)->first();
        $user = User::find($ct->tasker_id_fk);
        foreach($user->notifications as $notification) {
            if($notification->data['lesson']['client_id'] == $ct->client_id_fk && $notification->data['lesson']['job_id'] == $ct->task_id_fk){
                $user->notifications()->find($notification->id)->delete();
            }
        }
        $lsn = DB::select("select * from lessons where job_id='$ct->task_id_fk && client_id=$ct->client_id_fk';");
        $ddd = null;
        foreach($lsn as $l){
            $ddd = $l->id;
        }
        $ls = Lesson::find($ddd);
        $c = $ls->delete();
        $cmpt = new CompletedTask;
        $cmpt->tasker_id_fk = $ct->tasker_id_fk;
        $cmpt->task_id_fk = $ct->task_id_fk;
        $cmpt->client_id_fk = $ct->client_id_fk;
        $a = $cmpt->save();
        $b = $ct->delete();
        if($a && $b && $c){
            return redirect('/client/signedTasks')->with('success', 'Task has been listed as completed.');
        }
    }

    public function completedTask(){
        $ct = CompletedTask::all();
        $users = User::all();
        $tasks = Tasks::all();
        $jobs = TaskDetail::orderBy('created_at', 'asc')->paginate(5);
        $datas = Biodata::all();
        $userprofiles = UserProfile::all();
        return view('/client/completedTask', compact('jobs', 'datas', 'users', 'tasks', 'ct', 'userprofiles'));
    }

    public function notifications($id){
        return view('/client/notifications');
    }
}
