@extends('layouts.app')
@section('content')
@if(!Auth::guest())
	@if(Auth::user()->user_type == "Client")
		@include('inc.clientsidebar')
	@elseif(Auth::user()->user_type == "Tasker")
		@include('inc.sidebar')
	@endif
@endif
<br><br><br><br>
<div class="container">
	<br>
	<div class="row">
		<div class="col-md-6 offset-3">
			@if(session('success'))
				<br>
		        <h4 class="alert alert-info text-center">{{session('success')}}</h4>
		        <br>
		    @elseif(session('error'))
		    	<br>
		        <h4 class="alert alert-danger text-center">{{session('error')}}</h4>
		        <br>
		    @endif
		</div>
	</div>
	<div class="row">
		<h2 style="margin-bottom: 15px;">Posted Jobs:</h2>
	</div>
	<div class="row">
		<div class="col-md-12">
			<?php $a = 0;?>
			<?php $b = 0;?>
			<?php $bb = 0;?>
			@foreach($ct as $t)
				<?php $b++; ?>
			@endforeach
			@foreach($cmpt as $cmp)
				<?php $bb++; ?>
			@endforeach
			@if($x == 0)
				<nav class="navbar navbar-expand-lg navbar-light">
				  	<span class="navbar-brand" href="#">Search jobs by categories:</span>
				  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				    	<span class="navbar-toggler-icon"></span>
				  	</button>

				  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
				    	<ul class="navbar-nav mr-auto">
				      		<li class="nav-item active">
				        		<a class="nav-link" href="#"><span class="sr-only">(current)</span></a>
				      		</li>
				      		<li class="nav-item">
				        		<a class="nav-link" href="#"></a>
				      		</li>
				      		
				      		<li class="nav-item">
						        <a class="nav-link disabled" href="#"></a>
				      		</li>
				      		<li class="nav-item dropdown">
						        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						          <strong>Categories</strong>
						        </a>
						        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
						          	<a class="dropdown-item" href="/{{1}}/searchedJobsResults">Cleaning</a>
						          	<a class="dropdown-item" href="/{{2}}/searchedJobsResults">Plumber</a>
						          	<a class="dropdown-item" href="/{{3}}/searchedJobsResults">Electrition</a>
						          	<a class="dropdown-item" href="/{{4}}/searchedJobsResults">Errands</a>
						          	<a class="dropdown-item" href="/{{5}}/searchedJobsResults">Event Staffing</a>
						          	<a class="dropdown-item" href="/{{6}}/searchedJobsResults">Personal Assistant</a>
						          	<a class="dropdown-item" href="/{{7}}/searchedJobsResults">Furniture Assembly</a>
						          	<a class="dropdown-item" href="/{{8}}/searchedJobsResults">Help Moving</a>
						          	<a class="dropdown-item" href="/{{9}}/searchedJobsResults">Heavy Lifting</a>
						          	<a class="dropdown-item" href="/{{10}}/searchedJobsResults">Minor Home Repairs</a>
						          	<a class="dropdown-item" href="/{{11}}/searchedJobsResults">Shopping</a>
						          	<a class="dropdown-item" href="/{{12}}/searchedJobsResults">Yard Work & Removal</a>
						          	<a class="dropdown-item" href="/{{13}}/searchedJobsResults">Delivery</a>
						          	<a class="dropdown-item" href="/{{14}}/searchedJobsResults">Decoration</a>
						        </div>
						    </li>
				    	</ul>
				    	<form action="/searched" method="get" class="form-inline my-6 my-lg-0">
				      		<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="searchjob" id="searchjob">
				      		<button class="btn btn-outline-success" onclick="return validate();">Search</button>
				    	</form>
				  	</div>
				</nav>
			@endif

			<?php $c = 0;?>
			<?php $cc = 0; ?>
			@foreach($jobs as $job)
				<?php $c = 0; ?>
				@foreach($ct as $t)
					@if($t->task_id_fk == $job->id)
						<?php $c++; ?>
					@endif
				@endforeach
				<?php $cc = 0; ?>
				@foreach($cmpt as $cmp)
					@if($cmp->task_id_fk == $job->id)
						<?php $cc++; ?>
					@endif
				@endforeach
				@if($c == 0 && $cc == 0)
					<div class="card">
						<div class="card-body" style="background: lightgrey;">
							<br>
							<div class="row">
								<div class="col-md-1"></div>
								<div class="col-md-11">
									<a href="/{{$job->id}}/task" class="text-primary h4 nav-link">{{$job->task_name}}</a>
									@foreach($datas as $data)
										@if($job->client_id_fk == $data->id)
											@foreach($users as $user)
												@if($data->user_id_fk == $user->id)
													<span style="margin-left: 35px;">
														{{$user->fname}} {{$user->lname}}
													</span>
												@endif
											@endforeach
										@endif
									@endforeach
									<br>
									<br>
									<small style="margin-left: 35px;">{{$job->task_details}}</small>
									<br>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<a href="/xyz/{{$job->id}}" class="btn btn-success float-right" style="margin-bottom: 10px; margin-right: 20px;">Apply for this Task</a>
									<br>
								</div>
							</div>
						</div>
						<div class="card-footer" style="background: darkgrey;">
							<div class="row">
								<div class="col-md-3">
									<p style="margin-left: 73px;">{{$job->created_at}}</p>
								</div>|
								<div class="col-md-4">
									<p>{{$job->task_location}}</p>
								</div>
							</div>
						</div>
					</div>
					<br>
					
				@endif
			@endforeach
			
			<hr>
			{{$jobs->links()}}
			</div>
		</div>
	</div>
</div>
@endsection