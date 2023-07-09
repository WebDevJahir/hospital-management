<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Meta -->
		<meta name="description" content="Hospice Bangladesh Ltd">
		<meta name="author" content="E-Light Software ltd">
		<link rel="shortcut icon" href="img/fav.png" />

		<!-- Title -->
		<title>Hospice Bangladesh</title>
		
		<!-- *************
			************ Common Css Files *************
		************ -->
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />

		<!-- Master CSS -->
		<link rel="stylesheet" href="assets/css/main.css" />

	</head>
	<body class="authentication">

		<!-- Container start -->
		<div class="container">
			
			<!-- Form start -->
			<form action="{{url('post-login')}}" method="POST" id="logForm">
            	{{ csrf_field() }}
				<!-- Row start -->
				<div class="row justify-content-md-center">
					<div class="col-xl-4 col-lg-5 col-md-5 col-sm-6 col-12">
						
						<!-- Login screen start -->
						<div class="login-screen">
							<div class="login-box">
								<div class="text-center">
									<a href="/"  class="login-logo" style="justify-content: center;">
										<img src="assets/img/logo.png" alt="Hospice Bangladesh Ltd" />
									</a>
									<h5>Welcome back,<br />Please Login to your Account.</h5>
								</div>
								
            						
									<div class="form-group">
										<input type="text" name="email" class="form-control" placeholder="Email" />
									</div>
									<div class="form-group">
										<input type="password" name="password" class="form-control" placeholder="Password" />
									</div>
									@if ($errors->has('log_in'))
						                <span class="text-danger">{{ $errors->first('log_in') }}</span>
						            @endif 
									<div class="actions mb-4">
										<div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input" id="remember_pwd">
											<label class="custom-control-label" for="remember_pwd">Remember me</label>
										</div>
										 
										<button type="submit" class="btn btn-danger">Login</button>
									</div>
									<hr>
								
							</div>
						</div>
						<!-- Logi screen end -->

					</div>
				</div>
				<!-- Row end -->

			</form>
			<!-- Form end -->

		</div>
		<!-- Container end -->

	</body>
</html>