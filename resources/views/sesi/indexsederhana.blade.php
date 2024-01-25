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
		<div class="w-50 center border rounded px-3 py-3 mx-auto">
			<h1>Login</h1>
			<form action="/sesi/login" method="post">
			@csrf
			<div class="mb-3">
				<label for="email" class="form-label">Email</label>
				<input type="email" name="email" class="form-control">
			</div>
			<div class="mb-3">
				<label for="password" class="form-label">Email</label>
				<input type="password" name="password" class="form-control">
			</div>
			<div class="mb-3 d-grid">
				<button name="submit" type="submit" class="btn btn-primary">Login</button>
			</div>
			</form>

		</div>
	</section>

	<script src="{{asset('template/login/js/jquery.min.js')}}"></script>
  <script src="{{asset('template/login/js/popper.js')}}"></script>
  <script src="{{asset('template/login/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('template/login/js/main.js')}}"></script>

	</body>
</html>

