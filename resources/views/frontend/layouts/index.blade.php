<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  @yield('title')
  <meta content="" name="description">
  <meta content="" name="keywords">

  @include('frontend.partials.favicon')
  @include('frontend.partials.css')

</head>

<body>

  @include('frontend.partials.header')

  @yield('container')

  @include('frontend.partials.footer')

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  @include('frontend.partials.js')

</body>

</html>