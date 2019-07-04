@extends('layouts.app')
@section('content')
<br><br><br><br>
<div class="container">
	<div class="row">
		<div class="col-md-8 offset-2">
			<h2 style="margin-top: 15px;" class="text-center">Describe Your Task</h2>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-10 offset-1">
			<div class="card">
				<div class="card-body">
					<form action="/client" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group">
							<label>TASK NAME:</label>
						    <input type="text" id="taskname" name="taskname" class="form-control" placeholder="Enter task name"  oninput="hide()" autofocus>
						    <p><small id="tsk" class="text-danger"></small></p>
						</div>
						<br>
						<!--<p>TASK INTEREST</p>-->
						<label style="font-size: 17px; margin-top: 20px;">TASK CATEGORY:</label>
						<div class="row">
							<div class="col-md-4">
								<select class="dropdown-item" style="border:2px solid lightgrey;" name="category_type" value="category_type" ><option value="Cleaning">Cleaning</option><option value="Plumber">Plumber</option><option value="Electrition">Electrition</option><option value="Errands">Errands</option><option value="Event Staffing">Event Staffing</option><option value="Personal Assistant">Personal Assistant</option><option value="Furniture Assembly">Furniture Assembly</option><option value="Help Moving">Help Moving</option><option value="Heavy Lifting">Heavy Lifting</option><option value="Minor Home Repairs">Minor Home Repairs</option><option value="Shopping">Shopping</option><option value="Yard Work & Removal">Yard Work & Removal</option><option value="Delivery">Delivery</option><option value="Decoration">Decoration</select>
							</div>
						</div>
						<p><small id="a" class="text-danger"></small></p>
						<br><br>
						<label>YOUR TASK LOCATION</label>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								    <input type="text" id="streetadr" name="streetadr" class="form-control" placeholder="Enter street address" oninput="hide()">
								    <p><small id="kl" class="text-danger"></small></p>
								</div>
							</div>
						</div>
						<br>
						<label>TASK DETAIL</label>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
								    <textarea type="text" name="body" id="input" class="form-control" rows="4" value="" placeholder="Describe your task detail..." oninput="hide()"></textarea>
								    <p><small id="d" class="text-danger"></small></p>
								</div>
							</div>
						</div>
						<br>
						<label>TASK DATE</label>
						<div class="card" style="margin-top: 10px;">
							<div class="card-body">
								<div class="row" style="margin-top: 8px;">
									<div class="col-md-4">
										<div class="input-group-prepend">
										    <div class="input-group-text">
										    	<input type="radio" name="taskdate" id="rb1" onclick="hide()" value="Today">
										    	<span style="margin-left: 10px;">Today</span>
										    </div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="input-group-prepend">
										    <div class="input-group-text">
										    	<input type="radio" name="taskdate" id="rb2" onclick="hide()" value="Within 3 Days">
										    	<span style="margin-left: 10px;">Within 3 Days</span>
										    </div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="input-group-prepend">
										    <div class="input-group-text">
										    	<input type="radio" name="taskdate" id="rb3" onclick="hide()" value="Today">
										    	<span style="margin-left: 10px;">Within a Week</span>
										    </div>
										</div>
									</div>
									</div>
								<p><small id="m" class="text-danger"></small></p>
							</div>
						</div>

						<br>
						
						<label style="font-size: 17px; margin-top: 20px;">HOW BIG IS YOUR TASK?</label>
						<div class="row">
							<div class="col-md-12">
								<hr>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="input-group-text">
							    	<input type="radio" name="time" id="rb4" aria-label="Checkbox for following text input" onclick="hide()" value="Small - Est. 1 hr">
							    	<span style="margin-left: 10px;">Small - Est. 1 hr</span>
						    	</div>
							</div>
							<div class="col-md-4">
								<div class="input-group-text">
							    	<input type="radio" name="time" id="rb5" aria-label="Checkbox for following text input" onclick="hide()" value="Medium - Est. 2-3 hrs">
							    	<span style="margin-left: 10px;">Medium - Est. 2-3 hrs</span>
						    	</div>
							</div>
							<div class="col-md-4">
								<div class="input-group-text">
							    	<input type="radio" name="time" id="rb6" aria-label="Checkbox for following text input" onclick="hide()" value="Large - Est. 4+ hrs">
							    	<span style="margin-left: 10px;">Large - Est. 4+ hrs</span>
						    	</div>
							</div>
						</div>
						<p><small id="cc" class="text-danger"></small></p>
						<br>
						<p>If you need two or more Taskers, please post additional tasks for each Tasker needed.</p>
						<button class="btn btn-success btn-lg float-right" style="color: white;" onclick="return validate()">Continue</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<br>
	<script type="text/javascript">
		function validate(){
			if(document.getElementById("taskname").value == ""){
				document.getElementById('tsk').innerHTML = 'Please fill this task name field.';
				return false;
			}
			else if(document.getElementById("streetadr").value == ""){
				document.getElementById('kl').innerHTML = 'Please fill this street field.';
				return false;
			}
			else if(document.getElementById("input").value == ""){
				document.getElementById('d').innerHTML = 'Please fill the detail field of your task.';
				return false;
			}
			else if(!document.getElementById("rb1").checked && !document.getElementById("rb2").checked && !document.getElementById("rb3").checked){
				document.getElementById('m').innerHTML = 'Please check any of above radio buttons .';
				return false;
			}
			else if(!document.getElementById("rb4").checked && !document.getElementById("rb5").checked && !document.getElementById("rb6").checked){
				document.getElementById('cc').innerHTML = 'Please check any of above radio buttons .';
				return false;
			}
			else {
				return true;
			}
		}
		function hide(){
			document.getElementById('a').innerHTML = '';
			document.getElementById('kl').innerHTML = '';
			document.getElementById('d').innerHTML = '';
			document.getElementById('cc').innerHTML = '';
			document.getElementById('tsk').innerHTML = '';
			document.getElementById('m').innerHTML = '';
			document.getElementById('c').innerHTML = '';
		}
	</script>
</div>
@endsection
