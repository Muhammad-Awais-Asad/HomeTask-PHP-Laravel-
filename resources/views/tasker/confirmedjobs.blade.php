@extends('layouts.app')
@section('content')
@include('inc.sidebar')
<br><br><br><br>
<div class="container">
	<br>
	<div class="row">
		<div class="col-md-3">
			<h2>Confirmed Jobs:</h2>
			<hr>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			@if($data != null)
				@foreach($data as $d)
					@foreach($td as $t)
						@if($d->task_id_fk == $t->id)
						<div class="card">
							<div class="card-body" style="background: lightgrey;">
								<br>
								<div class="row">
									<div class="col-md-11">
										<h4 class="text-primary">{{$t->task_name}}</h4>
									</div>
								</div>
								<br>
								@foreach($users as $user)
									@if($d->task_id_fk == $t->id)
										@if($t->client_id_fk == $user->id)
											<strong>Dealt with:</strong> <span> {{$user->fname}} {{$user->lname}} </span>
										@endif
									@endif
								@endforeach
								<br><br>
								<strong>Task details:</strong><small style="margin-left: 10px;"> {{$t->task_details}} </small>
							</div>
							<div class="card-footer" style="background: darkgrey;">
								<div class="row">
									<div class="col-md-1"></div>
									<div class="col-md-4">
										<strong>Confirmed at:</strong> <span> {{$d->created_at}}</span>
									</div>|
									<div class="col-md-1"></div>
									<div class="col-md-5">
										<strong>Address:</strong><span> {{$t->task_location}}</span>
									</div>
								</div>
							</div>
						</div>
						@endif
					@endforeach
					<br>
				@endforeach
			@else
				<h4 class="col-md-6 offset-3 alert alert-success text-success text-center"> No confirmed task yet. </h4>
			@endif
			<br>
		</div>
	</div>
</div>
@endsection