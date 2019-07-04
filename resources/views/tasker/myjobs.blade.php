@extends('layouts.app')
@section('content')
@include('inc.sidebar')
<br>
<br>
<br>
<br>
<div class="container">
	<br>
	<div class="row">
		<div class="col-md-12">
			<a href="/client/uploadedTasks" class="btn btn-success btn-lg">Apply for Next Task</a>
			<br><br>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 offset-3">
			@if(session('success'))
				<h4 class="alert alert-success text-success text-center"> {{ session('success') }} </h4>
			@elseif(session('error'))
				<h4 class="alert alert-danger text-danger text-center"> {{ session('error') }} </h4>
			@endif
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<h2 style="margin-left: 35px;">Applied Jobs:</h2>
			
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			@if(count($jobs) !== 0)
				@foreach($jobs as $job)
					@if($job->tasker_id_fk == auth()->user()->id)
						<div class="card">
							<div class="card-body" style="background: lightgrey;">
								<br>
								<div class="row">
									<div class="col-md-1"></div>
									<div class="col-md-11">
										@foreach($tasks as $task)
											@if($job->task_id_fk == $task->id)
												<h4 class="text-primary">{{$task->task_name}}</h4>
												@if(count($users) !== 0)
													@foreach($users as $user)
														@if($task->client_id_fk == $user->id)
															{{$user->fname}} {{$user->lname}}
														@endif
													@endforeach
												@endif
												<br><br>
												<small>{{$task->task_details}}</small>
												<br>
												<a href="/xyz/{{$job->id}}/delete" class="btn btn-danger float-right">Cancel this Task</a>
											@endif
										@endforeach
									</div>
								</div>
							</div>
							<div class="card-footer" style="background: darkgrey;">
								<div class="row">
									<div class="col-md-3">
										@if(auth()->user()->id == $job->tasker_id_fk)
											@foreach($tasks as $task)
												@if($job->task_id_fk == $task->id)
													<p style="margin-left: 73px;">{{$task->created_at}}</p>
												@endif
											@endforeach
										@endif
									</div>|
									<div class="col-md-4">
										@if(auth()->user()->id == $job->tasker_id_fk)
											@foreach($tasks as $task)
												@if($job->task_id_fk == $task->id)
													<p style="margin-left: 73px;">{{$task->task_location}}</p>
												@endif
											@endforeach
										@endif
									</div>
								</div>
							</div>
						</div>
						<br>
					@endif
				@endforeach
			@else
				<div class="row">
					<div class="col-md-6 offset-3">
						<h4 class="alert alert-info text-info text-center">Not yet applied to any job, apply some.</h4>
					</div>
				</div>
			@endif
		</div>
	</div>
</div>
@endsection