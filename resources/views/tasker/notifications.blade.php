@extends('layouts.app')
@section('content')
@include('inc.sidebar')
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
					<a href="/tasker/{{$notifications->data['lesson']['job_id']}}/confirmedTask" class="dropdown-item text-dark">
                    	A client has accepted your task request, see details.
                	</a>
                @else
                	<a href="/tasker/{{$notifications->data['lesson']['job_id']}}/confirmedTask" class="dropdown-item text-success">
                    	A client has accepted your task request, see details.
                	</a>
                @endif
			@endforeach
		</div>
	</div>
</div>
@endsection