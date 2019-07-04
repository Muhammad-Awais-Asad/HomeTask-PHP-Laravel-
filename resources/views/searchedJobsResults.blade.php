@extends('layouts.app')
@section('content')
<br><br><br><br>
<div class="container">
	<br>
	<h2>Jobs matching to your search:-</h2>
	@foreach($data as $dt)
		<br>
		<div class="card">
			<div class="card-body" style="background: lightgrey;">
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-9">
						<br>
						<a href="/{{$dt->id}}/task" class="text-primary h4 nav-link">{{$dt->task_name}}</a>
						<br>
						<div class="row">
							<div class="col-md-1"></div>
							<div class="col-md-11">
								@foreach($users as $user)
									@if($user->id == $dt->client_id_fk)
										{{$user->fname}} {{$user->lname}}
									@endif
								@endforeach
								<br><br>
								<small>{{$dt->task_details}}</small>
								<br>
							</div>
						</div>
					</div>
				</div>
				<a href="/xyz/{{$dt->id}}" class="btn btn-success float-right" style="margin-bottom: 10px; margin-right: 20px;">Apply for this Task</a>
			</div>
			<div class="card-footer" style="background: darkgrey;">
				<div class="row">
					<div class="col-md-3">
						<p style="margin-left: 73px;">{{$dt->created_at}}</p>
					</div>
					|
					<div class="col-md-4">
						<p style="margin-left: 73px;">{{$dt->task_category}}</p>
					</div>
				</div>
			</div>
		</div>
	@endforeach
</div>
@endsection