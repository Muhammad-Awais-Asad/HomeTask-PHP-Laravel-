@extends('layouts.app')
@section('content')
@include('inc.clientsidebar')
<br><br><br><br>
<div class="container">
    <br>
	<div class="row">
		<div class="col-md-6 offset-3">
			@if(session('success'))
                <br>
                <h4 class="alert alert-success text-center">{{session('success')}}</h4>
                <br>
            @elseif(session('error'))
                <br>
                <h4 class="alert alert-danger text-center">{{session('error')}}</h4>
                <br>
            @endif
		</div>
	</div>
    <div class="row">
        <h2 style="margin-bottom: 15px;">Completed Jobs:</h2>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php $a = 0;?>
            @foreach($jobs as $job)
                @if($job->client_id_fk == auth()->user()->id)
                    @foreach($ct as $t)
                        @if($t->task_id_fk == $job->id)
                            <div class="card">
                                <div class="card-body" style="background: lightgrey;">
                                    <div class="row">
                                        <div class="col-md-11">
                                            @if(Auth::check())
                                                @if((auth()->user()->id == $job->client_id_fk))
                                                	<p class="text-primary h4 nav-link">{{$job->task_name}}</p>
                                                    @foreach($userprofiles as $userprofile)
                                                        @if($t->tasker_id_fk == $userprofile->user_id_fk)
                                                            @foreach($users as $user)
                                                                @if($userprofile->user_id_fk == $user->id)
                                                                    <span style="margin-left: 35px;">
                                                                        <strong>Dealt With:</strong> {{$user->fname}} {{$user->lname}}
                                                                    </span>
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    @endforeach
                                                    <br>
                                                    <br>
                                                    <small style="margin-left: 35px;">{{$job->task_details}}</small>
                                                    <br>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="com-md-1"></div>
                                        <div class="col-md-4">
                                            @else
                                                <h4 class="text-primary">{{$job->task_name}}</h4>
                                                @foreach($datas as $data)
                                                    @if($job->client_id_fk == $data->id)
                                                        @foreach($users as $user)
                                                            @if($data->user_id_fk == $user->id)
                                                                {{$user->fname}} {{$user->lname}}
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                                <br>
                                                <br>
                                                <small>{{$job->task_details}}</small>
                                                <br>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            @if(Auth::check())
                                                @if(auth()->user()->user_type == "Tasker")
                                                    <a href="/xyz/{{$job->id}}" class="btn btn-success float-right" style="margin-bottom: 10px; margin-right: 20px;">Apply for this Task</a>
                                                    <br>
                                                @endif
                                            @else
                                                <a href="/xyz/{{$job->id}}" class="btn btn-success float-right" style="margin-bottom: 10px; margin-right: 20px;">Apply for this Task</a>
                                                <br>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer" style="background: darkgrey;">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p style="margin-left: 73px;">{{$job->created_at}}</p>
                                        </div>|
                                        <div class="col-md-4">
                                            <p >{{$job->task_location}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        @endif
                    @endforeach
                @endif
            @endforeach
            <hr>
            {{$jobs->links()}}
            </div>
        </div>
    </div>
</div>
@endsection