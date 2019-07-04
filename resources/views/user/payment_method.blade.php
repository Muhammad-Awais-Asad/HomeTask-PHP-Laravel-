@extends('layouts.app')
@section('content')
<br><br><br><br>
<div class="container">
	<div class="row">
		<div class="col-md-10 offset-1">
			<div class="h1">Register to become a Tasker</div>
			<br>
			<div class="card">
				<div class="card-header">Tasker Registration Processing Fee</div>
					<div class="card-body" style="background: lightgrey;">
						<form action="/payment" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
							{{ csrf_field() }}
							<br>
							<div class="form-group">
    							<p>If you move on to the next step of the registration process, we will charge your credit card a nonrefundable $20 registration processing fee. Notwithstanding payment of the fee, TaskRabbit does not guarantee placement as a Tasker on the Service.</p>
    							<br>
    							<p>Credit Card</p>
  							</div>
  							<br>
  							<div class="row">
  								<div class="col-md-6">
  									<div class="form-group">
									    <label >Number:</label>
									    <input type="text" name="cnumber" class="form-control" id="cnumber" autofocus>
									    <p><small id="a" class="text-danger" ></small></p>
									</div>
  								</div>
  							</div>
  							<br>
  							<label >Expiration Date:</label>
  							<div class="row">
  								<div class="col-md-2">
  									<div class="form-group">
									    <select class="dropdown-item " style="background: white;" aria-label="Month" name="month" id="month" title="Month"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12" selected="1">12</option></select>
									</div>
  								</div>/
  								<div class="col-md-2">
  									<div class="form-group">
  										<select class="dropdown-item " style="background: white;" aria-label="Year" name="year" id="Year" title="Year" ><option value="2018">2018</option><option value="2019">2019</option><option value="2020">2020</option><option value="2021">2021</option><option value="2022">2022</option><option value="2023">2023</option><option value="2024">2024</option><option value="2025">2025</option><option value="2026">2026</option><option value="2027">2027</option><option value="2028">2028</option><option value="2029" >2029</option></select>
									</div>
  								</div>
  							</div>
  							<div class="row">
  								<div class="col-md-6">
  									<div class="form-group">
									    <label >Security Code:</label>
									    <input type="number" name="scnumber" class="form-control" id="scnumber">
									    <p><small id="b" class="text-danger" ></small></p>
									</div>
  								</div>
  							</div>
  							<div class="row">
  								<div class="col-md-6">
  									<div class="form-group">
									    <label >Zip Code:</label>
									    <input type="number" name="zc" class="form-control" id="zc">
									    <p><small id="c" class="text-danger" ></small></p>
									</div>
  								</div>
  							</div>
  							<button class="btn btn-success btn-lg float-right" style="color: white;" onclick="return validate()">Continue</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function validate(){
			if(document.getElementById("cnumber").value == "" )
			{
				document.getElementById("a").innerHTML = "Card number field can not be empty.";
				return false;
			}
			else if(document.getElementById("scnumber").value == "")
			{
				document.getElementById("b").innerHTML = "Security code field can not be empty.";
				return false;
			}
			else if(document.getElementById("zc").value == "")
			{
				document.getElementById("c").innerHTML = "Zip code field can not be empty.";
				return false;
			}
			else{
				return true;
			}
		}
	</script>
</div>
@endsection