<?php

namespace App\Http\Controllers;

use App\User;
use App\TaskDetail;
use Illuminate\Http\Request;

class TaskDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/client/taskdetail');
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
        $a = auth()->user()->id;
        $user = User::find($a);
        $td = new TaskDetail;
        $td->client_id_fk = $user->id;
        $td->task_name = $request->taskname;
        $td->task_category = $request->category_type;
        $td->task_location = $request->streetadr;
        $td->task_completiondate = $request->taskdate;
        $td->task_duration = $request->time;
        $td->task_details = $request->body;
        $saved = $td->save();
        if($saved)
        {
            return redirect('/client/uploadedTasks')->with('success', 'Task has created.');
        }
        else
        {
            return redirect('/client/profile')->with('error', 'Task can not be created.');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\TaskDetail  $taskDetail
     * @return \Illuminate\Http\Response
     */
    public function show(TaskDetail $taskDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TaskDetail  $taskDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskDetail $taskDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TaskDetail  $taskDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TaskDetail $taskDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TaskDetail  $taskDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskDetail $taskDetail)
    {
        //
    }
}