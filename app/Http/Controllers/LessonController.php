<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\NewLessonNotification;
use App\Lesson;
use App\TaskDetail;
use App\User;

class LessonController extends Controller
{
    public function __construct(){
    	$this->middleware('auth');
    }

    public function newLesson($id){
    	$a = TaskDetail::where('client_id_fk', $id)->first();
    	$lesson = new Lesson;
    	$lesson->tasker_id = auth()->user()->id;
    	$lesson->client_id = $a;
    	$lesson->job_id = $id;
    	$lesson->save();
    	$user = User::where('id', '!=', auth()->user()->id)->get();

    	if(\Notification::send($user, new NewLessonNotification(Lesson::latest('id')->first()))){
    		return back();
    	}
    }
}