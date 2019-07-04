<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Home Tasks connects you to safe and reliable help in your neighbourhood</title>
		<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
		<link rel="icon" type="icon/png" href="{{ asset('images/logo.png') }}">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<nav class="navbar navbar-expand-lg navbar-light">
						<a class="navbar-brand" href="/">
							<img src="{{ asset('images/logo4.png') }}" alt="TaskRabbit">
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav mr-auto">
								<li class="nav-item">
									
								</li>
								<li class="nav-item">
									
								</li>
								<li class="nav-item dropdown">
									
								</li>
								<li class="nav-item">
									
								</li>
							</ul>
							<form class="form-inline">
								<ul class="navbar-nav mr-auto">
									<li class="nav-item">
										<a class=" text-success nav-link" href="/services" style="margin-right: 20px;">See Tasks</a>
									</li>
									<li class="nav-item">
										
									</li>
									<li class="nav-item dropdown">
										
									</li>
									<li class="nav-item">
										<a class=" text-success nav-link" href="/login" style="margin-right: 15px;">Login</a>
									</li>
									<li class="nav-item">
										@if (Route::has('register'))
		                                    <a class="btn btn-success" href="{{ route('register') }}">{{ __('Register') }}</a>
		                                @endif
									</li>
								</ul>
							</form>
						</div>
					</nav>
				</div>
			</div>
			@if(session('message'))
                <br>
                <div class="row">
                	<div class="col-md-6 offset-3">
                		<h4 class="alert alert-danger text-center">{{session('message')}}</h4>
                	</div>
                </div>
                <br>
            @endif
		</div>
		<img src="{{asset('images/Pic.jpg')}}" width="100%" height="500px">
		<footer style="background: white; ">
			<div class="container">
				<br>
				<h5 class="text-center" style="color: grey;">Contact us! We are friendly:</h5>
				<div class="row">
					<div class="col-md-2"><span> <strong>Usama Saleem:</strong> </span></div>
					<div class="col-md-8"></div>
					<div class="col-md-2"><span> <strong>Awais Asad:</strong> </span></div>
				</div>
				<div class="row" style="margin-top: 10px;">
					<div class="col-md-1">
						<h3><a class="text-dark" target="_blank" href="https://www.usamasaleem00@gmail.com"><i class="far fa-envelope"></i></a></h3>
					</div>
					<div class="col-md-1">
						<h3><a class="text-dark" target="_blank" href="https://www.facebook.com/TroublesomeUxama"><i class="fab fa-facebook-f"></i></a></h3>
					</div>
					<div class="col-md-1">
						<h3><a class="text-dark" target="_blank" href="https://www.instagram.com/troublesome_uxama/"><i class="fab fa-instagram"></i></a></h3>
					</div>
					<div class="col-md-7"></div>
					<div class="col-md-1">
						<h3><a class="text-dark" target="_blank" href="https://www.awaisasad20@gmail.com"><i class="far fa-envelope"></i></a></h3>
					</div>
					<div class="col-md-1">
						<h3><a class="text-dark" target="_blank" href="https://www.facebook.com/asad.awais.7"><i class="fab fa-facebook-f"></i></a></h3>
					</div>
				</div>
				<br>
				<h5 class="text-center"> <strong>Home Tasks&trade;</strong>. All rights reserved. 2019&reg;</h5>
			</div>
		</footer>
		<script type="text/javascript" src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/popper.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
	</body>
</html>