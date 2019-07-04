@extends('layouts.app')
@section('content')
<br><br><br><br>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="h1">Register to become a Tasker</div>
			<br>
			<div class="card">
				<div class="card-header">Add Your Rates & Skills</div>
					<div class="card-body" style="background: lightgrey;">
						<form action="/tasker" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
							{{ csrf_field() }}
							<p>Select your work categories and set your hourly rates. Suggested rates are based on what Clients choose most often among Taskers with similar category experience in your area. By setting your rates at the suggested level, you’ll set yourself up to earn more.</p>
							<br>
							<div class="" id="">
								<p><strong>Cleaning</strong></p>
								<p>Cleaning an apartment, condo, house, vacation home, or office.</p>
								<div class="card">
									<div class="card-header"><strong>Skill Expectations</strong></div>
									<div class="card-body">
										<p>Clients expect you to clean the entire place, including the kitchen, bedrooms, bathrooms, and common areas. • Bathrooms: Scrubbing sink, toilet, shower/bathtub, mirrors • Kitchen: Wash dishes, wipe cabinets, backsplash, stove, counters, appliances • Floors: Sweeping and mopping floors • Dusting: Furniture, hard surfaces, and window sills • Tidy: Straighten and organize • Taking out garbage and replacing trash bags It is the Client's expectation that you will bring your own cleaning supplies to every task.</p>
										<input type="checkbox" id="chkbx" onclick="endisable(this)">
  										<label class="form-check-label">I agree that I am able to fulfill these expectations.</label>
									</div>
								</div>
								<br>
								<div id="abc" style="display: none;">
									<div class="card">
										<div class="card-header"><strong>Your Tasker Rate</strong></div>
										<div class="card-body">
											<div class="row">
												<div class="col-md-1">
													<span class="float-right">$</span>
												</div>
												<div class="col-md-2">
													<input style="background: lightgrey;" type="number" name="inp" id="chk1" class="form-control" >
												</div>
												<div class="col-md-1">
													<span>.00/hr</span>
												</div>
												<div class="col-md-3">
													<p><strong>Most Taskers with your experience hired at:</strong></p>
													<p>17$/hr</p>
												</div>
												<div class="col-md-5">
													<p><strong>Client Rate:</strong></p>
													<p>$/hr</p>
												</div>
											</div>
										</div>
									</div>
									<br>
									<div class="card">
										<div class="card-header">
											<p><strong>What supplies do you bring to tasks?</strong></p>
											<p><small>Clients expect you to have basic supplies and a mop, and will only hire you if you have them.</small></p>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-md-4">
													<input type="checkbox" id="cb1" name="supply[]" value="Basic Supplies">
	  												<label class="form-check-label"><strong>Basic Supplies</strong></label>
	  												<p style="margin-left: 16px;"><small>glass & multi-purpose cleaner, sponges, scrub brushes, bucket, rags</small></p>
												</div>
												<div class="col-md-4">
													<input type="checkbox" id="cb2" name="supply[]" value="Mop">
	  												<label class="form-check-label"><strong>Mop</strong></label>
	  												<p style="margin-left: 16px;"><small>with bucket & floor cleaner</small></p>
												</div>
												<div class="col-md-4">
													<input type="checkbox" id="cb3" name="supply[]" value="Vacuum">
	  												<label class="form-check-label"><strong>Vacuum</strong></label>
												</div>
											</div>
										</div>
									</div>
									<br>
									<div class="card">
										<div class="card-header">
											<p><strong>Your Quick Pitch</strong></p>
										</div>
										<div class="card-body">
											<textarea type="text" name="quickpitch" id="txt" class="form-control" rows="4" value="" placeholder="Pitch clients on why you are the best person for this type of task."></textarea>
										</div>
									</div>
									<br>
									<div class="card">
										<div class="card-header">
											<p><strong>Level of experience</strong></p>
										</div>
										<div class="card-body">
											<select class="dropdown-item" style="background: lightgrey;" name="explvl" ><option value="No experience, but I am willing to learn">No experience, but I am willing to learn</option><option value="Some experience, I have done it myself around the home">Some experience, I have done it myself around the home</option><option value="I have had part-time experience">I have had part-time experience</option><option value="I have had professional experience">I have had professional experience</option><option value="I am professionally certified in this skill">I am professionally certified in this skill</option></select>
										</div>
									</div>
									<br>
									<button class="btn btn-success btn-lg float-right" style="color: white;" onclick="return validate()">Save</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function endisable(chkbx){
			var a = document.getElementById("abc");
        	a.style.display = chkbx.checked ? "block" : "none";
		}
		function validate(){
			if (document.getElementById("chk1").value == "") {
				alert("Tasker rate field can not be empty.");
				return false;
			}
			else if(document.getElementById("chk1").value < "15"){
				alert("Tasker rate can not be less then 15$.");
				return false;
			}
			else if(document.getElementById("chk1").value > 500){
				alert("Tasker rate can not be more then 500$.");
				return false;
			}
			else if(!document.getElementById('cb1').checked && !document.getElementById('cb2').checked && !document.getElementById('cb3').checked)
			{
				alert("Please check any of given checkboxes.");
				return false;
			}
			else if(document.getElementById("txt").value == ""){
				alert("Quick Pitch can't be empty.");
				return false;
			}
			else
			{
				return true;
			}
		}
	</script>
</div>
@endsection