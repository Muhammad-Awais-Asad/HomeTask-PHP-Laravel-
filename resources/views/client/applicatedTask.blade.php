@extends('layouts.app')
@section('content')
@include('inc.clientsidebar')
<br>
<br>
<br>
<div class="container">
	<br>
	<h3>Requested Task:</h3>
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
							<p style="margin-left: 10px;"> <strong>Requested By:</strong> {{$at->fname}} {{$at->lname}}</p>
						</div>
						<br>
						<div class="col-md-6">
							<p style="margin-left: 10px;" class="text-right"> <strong>Requested at:</strong> {{$t->created_at}}</p>
						</div>
					</div>
					<hr>
					<p style="margin-left: 10px;"><strong>Task Details: </strong>{{$task->task_details}}</p>
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
					<a href="/decreq/{{$task->id}}/{{$at->id}}" class="btn btn-danger float-left">Decline Request</a>
					<a href="/accpur/{{$task->id}}/{{$at->id}}" class="btn btn-success float-right">Accept Purposal</a>
				</div>
			</div>
		</div>
	</div>
	<br>
</div>
@endsection