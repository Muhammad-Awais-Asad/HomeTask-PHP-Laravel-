@extends('layouts.app')
@section('content')
<br><br><br><br>
<div class="container">
	<div class="row" >
		<div class="col-md-4 text-center" style="margin-top: 15px;">
			<p>1. Fill out Task Details</p>
		</div>
		<div class="col-md-4 text-center" style="margin-top: 15px;">
			<p><strong>2. View Taskers & Prices</strong></p>
		</div>
		<div class="col-md-4 text-center" style="margin-top: 15px;">
			<p>3. Confirm & Book</p>
		</div>
	</div>
	<div class="row" style="background: lightgrey;">
		<div class="col-md-8 offset-2">
			<p style="margin-top: 15px;" class="text-center"><strong>Trust & Safety Guarantee:</strong> All Taskers are fully vetted & background checked.</p>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-8 offset-2">
			<p style="margin-top: 15px; font-size: 30px;" class="text-center">Pick a Tasker</p>			
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<p class="text-center" style="font-size: 18px;">After booking, you can chat with your Tasker, agree on an exact time, or go over any requirements or questions, if necessary.</p>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-4">
			<div class="card">
				<div class="card-body">
					<strong>TASK DATE</strong>
					<div class="row" style="margin-top: 8px;">
						<div class="col-md-6">
							<div class="input-group-prepend">
							    <div class="input-group-text">
							    	<input type="radio" name="rb1" id="rb1" onclick="hide()" value="Today">
							    	<span style="margin-left: 10px;">Today</span>
							    </div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="input-group-prepend">
							    <div class="input-group-text">
							    	<input type="radio" name="rb1" id="rb1" onclick="hide()" value="Within 3 Days">
							    	<span style="margin-left: 10px;">Within 3 Days</span>
							    </div>
							</div>
						</div>
					</div>
					<div class="row" style="margin-top: 8px;">
						<div class="col-md-6">
							<div class="input-group-prepend">
							    <div class="input-group-text">
							    	<input type="radio" name="rb1" id="rb1" onclick="hide()" value="Today">
							    	<span style="margin-left: 10px;">Within a Week</span>
							    </div>
							</div>
						</div>
						<div class="col-md-6">
							<button class="btn btn-success">Choose Dates</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection