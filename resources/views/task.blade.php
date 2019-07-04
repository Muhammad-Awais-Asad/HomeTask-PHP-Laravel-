@extends('layouts.app')
@section('content')
<br><br><br><br>
<div class="container">
	<br>
	@if(!Auth::check())
		<a href="/" class="btn btn-secondary">Go Back</a>
		<br>
		<br>
	@endif
	<h3>Task details:</h3>
	<br>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header" style="background: lightgrey;">
					<h3 style="margin-left: 10px;">{{$task->task_name}}</h3>
				</div>
				<div class="card-body">
					<br>
					<p style="margin-left: 10px;" class="text-success">{{$task->task_category}}</p>
					<p style="margin-left: 10px;">The job is listed in following categories: {{$task->task_category}}</p>
					<br>
					<div class="row">
						<div class="col-md-6">
							<p style="margin-left: 10px;"> <strong>Posted By:</strong> {{$fn->fname}} {{$fn->lname}}</p>
						</div>
						<br>
						<div class="col-md-6">
							<p style="margin-left: 10px;" class="text-right"> <strong>Posted at:</strong> {{$task->created_at}}</p>
						</div>
					</div>
					<hr>
					<span style="margin-left: 10px;"><strong>Task Details: </strong>{{$task->task_details}}</span>
					<br>
					<br>
					<p style="margin-left: 10px;"><strong>Task Location: </strong>{{$task->task_location}}</p>
					<br>
					<p style="margin-left: 10px;"><strong>Task Due Date: </strong>{{$task->task_completiondate}}</p>
					<br>
					<p style="margin-left: 10px;"><strong>Task Type: </strong>{{$task->task_duration}}</p>
					<br>
					@if(Auth::check())
						@if(auth()->user()->user_type !== 'Client')
							<a href="/xyz/{{$task->id}}" class="btn btn-success float-right">Submit Purposal</a>
						@endif
					@else
						<a href="/xyz/{{$task->id}}" class="btn btn-success float-right">Submit Purposal</a>
					@endif
				</div>
			</div>
		</div>
	</div>
	<br>
</div>
@endsection