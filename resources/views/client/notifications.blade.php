@extends('layouts.app')
@section('content')
@include('inc.clientsidebar')
<br>
<br>
<br>
<div class="container">
	<br>
	<h2>All Notifications<small class="text-muted">({{auth()->user()->notifications->count()}})</small>:</h2>
	<hr>
	<div class="row">
		<div class="col-md-12">
			@foreach(auth()->user()->notifications as $notifications)
				@if($notifications->read_at)
					<a href="/client/{{$notifications->data['lesson']['job_id']}}/{{$notifications->data['lesson']['tasker_id']}}/applicatedTask" class="dropdown-item text-dark">
						A tasker has applied on your task, see details.
					</a>
				@else
					<a href="/client/{{$notifications->data['lesson']['job_id']}}/{{$notifications->data['lesson']['tasker_id']}}/applicatedTask" class="dropdown-item text-success">
						A tasker has applied on your task, see details.
					</a>
				@endif
			@endforeach
		</div>
	</div>
</div>
@endsection