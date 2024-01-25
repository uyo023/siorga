<!doctype html>
<html lang="en">
  <head>
  	<title>Halaman Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{asset('template/login/css/style.css')}}">
	@include('komponen.pesan')
	</head>
	<body class="img js-fullheight" style="background-image: url({{asset('template/login/images/bg.jpg')}});">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Register</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<form action="create" method="POST" class="signin-form">
					@csrf
                    <div class="form-group">
                      {{-- <input type="text" class="form-control" placeholder="email" required> --}}
                        <input type="text" name="name" class="form-control" placeholder="Nama" {{ Session::get('name') }}>
                  </div>

		      		<div class="form-group">
		      			{{-- <input type="email" class="form-control" placeholder="email" required> --}}
		      			<input type="email" name="email" class="form-control" placeholder="Email">
		      		</div>


	            <div class="form-group">
	              {{-- <input id="password-field" type="password" class="form-control" placeholder="Password" required> --}}
				  <input id="password-field" type="password" name="password" class="form-control" placeholder="Password">
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
				</div>
	            <div class="form-group">
	            	<button type="submit" class="form-control btn btn-primary submit px-3">Register</button>
					{{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
	            </div>
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
		            	{{-- <label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label> --}}
								</div>
								<div class="w-50 text-md-right">
									<a href="/sesi/login" style="color: #fff">Sudah Mempnyai Akun</a>
								</div>
	            </div>
	          </form>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('template/login/js/jquery.min.js')}}"></script>
  <script src="{{asset('template/login/js/popper.js')}}"></script>
  <script src="{{asset('template/login/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('template/login/js/main.js')}}"></script>

	</body>
</html>



