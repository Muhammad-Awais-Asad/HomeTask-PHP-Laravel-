@extends('layouts.app')
@section('content')
<br><br><br><br>
<div class="header" style="background: url({{ asset('images/Pic3.jpg') }}); height: 640px; width: 100%; background-position: center; background-repeat: no-repeat; background-size: cover; margin-top: 0px;">
<div class="container">
	<br><br><br><br><br><br>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-8">
			<h1>Book Your Next Task</h1>
			<br>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
			    <input style="border: none;" type="text" id="tehseel" name="tehseel" class="form-control" placeholder="Describe one task, e.g. fix the hole in my wall" >
			    <p><small id="b" class="text-danger"></small></p>
			    <hr>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-12">
			<a href="/client/taskdetail" class="btn btn-outline-success text-success" style="margin-left: 20px;">Minor Home Repairs</a>
			<a style="margin-left: 20px;" href="/user/commitment" class="btn btn-outline-success text-success">Furniture Assembly</a>
			<a  style="margin-left: 20px;" class="btn btn-outline-success text-success">Help Moving</a>
			<a  style="margin-left: 20px;" class="btn btn-outline-success text-success">Mounting</a>
			<a  style="margin-left: 20px;" class="btn btn-outline-success text-success">Shopping</a>
			<a  style="margin-left: 20px;" class="btn btn-outline-success text-success">Delivery</a>
			<a  style="margin-left: 20px;" class="btn btn-outline-success text-success">Pet Sitting</a>
		</div>
	</div>
</div>
@endsection