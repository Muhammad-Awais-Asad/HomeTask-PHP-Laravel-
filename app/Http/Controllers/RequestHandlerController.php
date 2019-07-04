<?php

namespace App\Http\Controllers;

use App\Notifications\NewLessonNotification;
use Illuminate\Support\Facades\Notification;
use App\Notifications\DatabaseNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use App\ConfirmedTasks;
use App\TaskDetail;
use App\Lesson;
use App\Tasks;
use App\User;
use DB;

class RequestHandlerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function declineRequest($id, $ud){
        $a = DB::select("select * from tasks where task_id_fk='$id';");
        foreach($a as $aa){
            foreach(\Auth::user()->notifications as $notification) {
                if($notification->data['lesson']['tasker_id'] == $aa->tasker_id_fk && $notification->data['lesson']['job_id'] == $aa->task_id_fk){
                    \Auth::user()->notifications()->find($notification->id)->delete();
                }
            }
            if($ud == $aa->tasker_id_fk){
                $b = $aa->id;
                $c = Tasks::find($b);
                $l = DB::select("select * from lessons where tasker_id='$aa->tasker_id_fk' && job_id='$aa->task_id_fk';");
                foreach($l as $lsn){
                    $lll = $lsn->id;
                }
                $lessn = Lesson::find($lll);
                if($c->delete() && $lessn->delete()){
                    return redirect('/client/profile')->with('success', 'You have successfully canceled the request.');
                }else{
                    return redirect('/client/profile')->with('error', 'Request can not be canceled.');
                }
            }
        }
    }

    public function acceptPurposal($id, $ud){
        $a = DB::select("select * from tasks where task_id_fk='$id';");
        foreach($a as $aa){
            foreach(\Auth::user()->notifications as $notification) {
                if($notification->data['lesson']['tasker_id'] == $aa->tasker_id_fk && $notification->data['lesson']['job_id'] == $aa->task_id_fk){
                    \Auth::user()->notifications()->find($notification->id)->delete();
                }
            }
            //if($ud == $aa->tasker_id_fk){
            $b = $aa->id;
            $c = Tasks::find($b);
            $o = $c->delete();
        }
        $l = DB::select("select * from lessons where job_id='$aa->task_id_fk';");
        foreach($l as $lsn){
            $lll = $lsn->id;
            $lessn = Lesson::find($lll);
            $m = $lessn->delete();
        }
        $ct = new ConfirmedTasks;
        $ct->tasker_id_fk = $ud;
        $ct->task_id_fk = $id;
        $ct->client_id_fk = auth()->user()->id;
        $user = User::find($ud);
        $f = TaskDetail::find($id);
        $f->tasker_name = $user->fname.' '.$user->lname;
        $f->task_date = $aa->created_at;
        $f->task_status = 2;
        $saved = $f->save();
        $i = TaskDetail::find($id);
        $lesson = new Lesson;
        $lesson->tasker_id = $lessn->tasker_id;
        $lesson->client_id = $i->client_id_fk;
        $lesson->job_id = $id;
        $lesson->save(); // Saving Notification
        $tasker = User::where('id', '=', $ud)->get();
        if(\Notification::send($tasker, new NewLessonNotification(Lesson::latest('id')->first()))) //     Sending Notification
        {
            return back();
        }
        $n = $ct->save();
        if($saved && $o && $m && $n){
            return redirect('/client/signedTasks')->with('success', 'Tasker has been selected for this task.');
        }else{
            return redirect('/client/profile')->with('error', 'Request can not be canceled.');
        }
            //}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}