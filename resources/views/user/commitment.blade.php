@extends('layouts.app')
@section('content')
<br><br><br><br>
<div class="container">
	<div class="row">
		<div class="col-md-10 offset-1">
			<div class="h1">Register to become a Tasker</div>
			<div class="card">
				<div class="card-body" style="background: lightgrey;">
					<p>Being Your Own Boss</p>
					<p style="margin-left: 20px;">There are many advantages of being a Tasker; you can make extra money, control your own schedule, market yourself, find new clients, be your own boss.</p>
					<br>
					<p style="margin-left: 20px; margin-top: -13px;">You are your own business and will be working as an independent contractor for your Clients that you connect with on the TaskRabbit platform. You are not an employee of TaskRabbit. We don’t supervise, direct or control your work-- you are responsible for how you present yourself to your Clients.</p>
					<br>
					<p style="margin-left: 20px; margin-top: -13px;">Our Terms of Service govern the use of the TaskRabbit platform by all Users. Please read them. We are looking forward to having you join us on the platform, so let’s get started.</p>
					<br>
					<p style="margin-left: 20px; margin-top: -13px;"><strong>I acknowledge that I have read and understood</strong> the Terms of Service and Privacy Policy, and that I agree to the Terms of Service and Privacy Policy.</p>
					<br>
					<div class="form-check" style="margin-left: 20px; margin-top: -13px;">
  						<input class="form-check-input" type="checkbox" id="chkbx" onclick="show()">
  						<label class="form-check-label">I agree</label>
  						<p><small id="a" class="text-danger"> </small></p>
					</div>
					<br>
					<a href="/user/eligibility" class="btn btn-success float-right" onclick="return validate()">Continue</a>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	function validate(){
		if(!document.getElementById('chkbx').checked){
			document.getElementById('a').innerHTML = "Please check this checkbox.";
			return false;
		}else{
			return true;
		}
	}
	function show(){
		document.getElementById('a').innerHTML = "";
	}
</script>
@endsection