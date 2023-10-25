<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />
    <link rel="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-  free@5.15.4/css/fontawesome.min.css">
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
  {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"> --}}

		<!-- Bootstrap CSS -->
		<link href="{{ url('/asset/css/bootstrap.min.css') }}" rel="stylesheet">
		{{-- <link href="{{url('/asset/https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css')}}" rel="stylesheet"> --}}
		<link href="{{ url('/asset/css/tiny-slider.css') }}" rel="stylesheet">
		<link href="{{ url('/asset/css/style.css') }}" rel="stylesheet">
		{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
		<title>Furni Free Bootstrap 5 Template for Furniture and Interior Design Websites by Untree.co </title>
	</head>

	<body>

		<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">

			<div class="container">
				<a class="navbar-brand" href="/">Furni<span>.</span></a>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li >
							<a class="nav-link" href="/">Home</a>
						</li>
						<li ><a class="nav-link" href="/shop">Shop</a></li>
						<li ><a class="nav-link" href="/about">About us</a></li>
						<li><a class="nav-link" href="/services">Services</a></li>
						<li><a class="nav-link" href="/blog">Blog</a></li>
						<li><a class="nav-link" href="/contact">Contact us</a></li>
					</ul>

					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
						{{-- <li><a class="nav-link" href="/furni/login"><img src="{{url('/asset/images/user.svg')}}"> --}}
						@if (Auth::user())
						 <li><a class="nav-link" href="/userprofile"><img src="{{ url('/asset/images/user.svg') }}"> 
						  {{ Auth::user()->name }}
						  <li><a class="nav-link" href="/showcart"><img src="{{ url('/asset/images/cart.svg') }}"></a></li>
						@else
						<li><a class="nav-link" href="/furni/login"><img src="{{ url('/asset/images/user.svg') }}">
							<li><a class="nav-link" href="/furni/login"><img src="{{ url('/asset/images/cart.svg') }}"></a></li>
						@endif
						</a></li>
						@if (Auth::guest())
						@else
							<li><a class="nav-link" href="/logout">logout</a></li> @endif
     </ul>
    </div>
   </div>
    
  </nav>
  <!-- End Header/Navigation -->
        
 
