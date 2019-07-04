<?php

namespace App\Http\Controllers;

use App\User;
use App\UserProfile;
use App\Tasks;
use Illuminate\Http\Request;
use App\Notifications\NewLessonNotification;
use App\Lesson;
use App\TaskDetail;
use DB;
use App\Job;
use App\Biodata;
use Illuminate\Notifications\Notifiable;
use App\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Notification;

class TasksController extends Controller
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
    public function store(Request $request, $id)
    {
        $td = new Tasks;
        $a = auth()->user()->id;
        $b = UserProfile::where('user_id_fk', $a)->first();
        $d = DB::select("select `tasker_id_fk`, `task_id_fk` from tasks where tasker_id_fk='$a';");
        $e = DB::select("select `tasker_id_fk` from tasks where task_id_fk='$id';");
        if($d == null) // Means not applied by this tasker before.
        {
            $td->tasker_id_fk = $a;
            $td->task_id_fk = $id;
            $saved = $td->save();
            $i = TaskDetail::find($id);
            $aaa = $i->client_id_fk;
            $lesson = new Lesson;
            $lesson->tasker_id = auth()->user()->id;
            $lesson->client_id = $i->client_id_fk;
            $lesson->job_id = $id;
            $lesson->save(); // Saving Notification
            //$user = User::where('id', '!=', auth()->user()->id)->get();
            $user = User::where('id', '=', $aaa)->get();

            if(\Notification::send($user, new NewLessonNotification(Lesson::latest('id')->first()))) // Sending Notification
            {
                return back();
            }

            if($saved)
            {
                return redirect('/tasker/myjobs')->with('success', 'Request has applied for Task.');
            }
            else
            {
                return redirect('/client/uploadedTasks')->with('error', 'Request could not applied for Task.');
            }
        }
        else // Means applied earlier.
        {
            if($e !== []) // If applying on already applied job
            {
                foreach($e as $ee)
                {
                    //dd($a);
                    if($a == $ee->tasker_id_fk) // If id matches with the id of previously applied job
                    {
                        return redirect('/client/uploadedTasks')->with('error', 'Already applied for this Task.');
                    }
                }
                $td->tasker_id_fk = $b->user_id_fk;
                $td->task_id_fk = $id;
                $saved = $td->save();
                $i = TaskDetail::find($id);
                $aaa = $i->client_id_fk;
                $lesson = new Lesson;
                $lesson->tasker_id = auth()->user()->id;
                $lesson->client_id = $i->client_id_fk;
                $lesson->job_id = $id;
                $lesson->save();
                $user = User::where('id', '=', $aaa)->get();

                if(\Notification::send($user, new NewLessonNotification(Lesson::latest('id')->first()))){
                    return back();
                }

                if($saved)
                {
                    return redirect('/tasker/myjobs')->with('success', 'Request has applied for Task.');
                }
                else
                {
                    return redirect('/client/uploadedTasks')->with('error', 'Request could not applied for Task.');
                }
            }
            else // if applying on new job
            {
                $td->tasker_id_fk = $b->user_id_fk;
                $td->task_id_fk = $id;
                $saved = $td->save();
                $i = TaskDetail::find($id);
                $aaa = $i->client_id_fk;
                $lesson = new Lesson;
                $lesson->tasker_id = auth()->user()->id;
                $lesson->client_id = $i->client_id_fk;
                $lesson->job_id = $id;
                $lesson->save();
                $user = User::where('id', '=', $aaa)->get();
                if(\Notification::send($user, new NewLessonNotification(Lesson::latest('id')->first()))){
                    return back();
                }
                if($saved)
                {
                    return redirect('/tasker/myjobs')->with('success', 'Request has applied for Task.');
                }
                else
                {
                    return redirect('/client/uploadedTasks')->with('error', 'Request could not applied for Task.');
                }
            }
        }
    }

    public function newLesson($id){
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function show(Tasks $tasks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit(Tasks $tasks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tasks $tasks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tasks  $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $a = Tasks::find($id);
        $b = TaskDetail::find($a->task_id_fk);
        $user = User::find($b->client_id_fk);
        foreach($user->notifications as $notification) {
            if($notification->data['lesson']['id'] == $id){
                $notification_deleted = $user->notifications()->find($notification->id)->delete();
            }
        }
        $task = Tasks::find($id);
        $task_deleted = $task->delete();
        $lesson = Lesson::find($id);
        $lesson_deleted = $lesson->delete();
        if($task_deleted && $lesson_deleted && $notification_deleted)
        {
            return redirect('/tasker/myjobs')->with('success', 'Job has been canceled.');
        }
        else
        {
            return redirect('/tasker/myjobs')->with('error', 'Job can not be canceled.');
        }
    }

    public function searchedJobs($id){
        $users = User::all();
        $tasks = Tasks::all();
        $biodatas = Biodata::all();
        $job = Job::find($id);
        $data = DB::select("select * from task_details where task_category like '%$job->job_name%';");
        if($data == []){
            return redirect('/')->with('message', 'No job found.');
        }else{
            return view('/searchedJobsResults', compact('job', 'data', 'users', 'tasks', 'biodatas'));
        }
    }

    public function Searched(Request $request){
        $users = User::all();
        $tasks = Tasks::all();
        $biodatas = Biodata::all();
        $data = DB::select("select * from task_details where task_category like '%$request->searchjob%';");
        //dd($data);
        if($data == []){
            return redirect('/')->with('message', 'No job found.');
        }else{
            return view('/searchedJobsResults', compact('biodatas', 'users', 'tasks', 'data'));
        }
    }
}
