@extends('layouts.app')
@section('content')
@include('inc.sidebar')
<br><br><br><br>
<div class="container">
	<br>
	<h3>Accepted Task:</h3>
	<br>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header" style="background: lightgrey;">
					<h3 style="margin-left: 10px;">{{$task->task_name}}</h3>
				</div>
				<div class="card-body">
					<br>
					<p style="margin-left: 10px;">The job is listed in following categories: <span style="margin-left: 10px;" class="text-success">{{$task->task_category}}</span></p>
					<br>
					<div class="row">
						<div class="col-md-6">
							<p style="margin-left: 10px;"> <strong>Accepted By:</strong> {{$at->fname}} {{$at->lname}}</p>
						</div>
						<br>
						<div class="col-md-6">
							<p style="margin-left: 10px;" class="text-right"> <strong>Accepted at:</strong> {{$t->created_at}}</p>
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
				</div>
			</div>
		</div>
	</div>
	<br>
</div>
@endsection