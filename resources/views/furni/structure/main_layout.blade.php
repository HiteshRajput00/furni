
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Untree.co">
    <link rel="shortcut icon" href="favicon.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap4" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
 
		<!-- Bootstrap CSS -->
		<link href="{{ url('/asset/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ url('/asset/css/tiny-slider.css') }}" rel="stylesheet">
		<link href="{{ url('/asset/css/style.css') }}" rel="stylesheet">
        {{-- <link rel="stylesheet" href="https://1834-124-253-82-196.ngrok-free.app/asset/css/bootstrap.min.css">
<link rel="stylesheet" href="https://1834-124-253-82-196.ngrok-free.app/asset/css/tiny-slider.css">
<link rel="stylesheet" href="https://1834-124-253-82-196.ngrok-free.app/asset/css/style.css"> --}}

        {{-- <link rel="stylesheet" href="{{ asset('/asset/css/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('/asset/css/css/responsive.css') }}"> --}}
        <script src="https://js.stripe.com/v3/"></script>
		<title>Furni Free Bootstrap 5 Template for Furniture and Interior Design Websites by Untree.co </title>
	</head>

	<body>

    <?php $data = App\Models\SiteMeta::class::first(); ?>
		<!-- Start Header/Navigation -->
		<nav class="custom-navbar navbar navbar navbar-expand-md navbar-dark bg-dark" arial-label="Furni navigation bar">
			<div class="container">
				<a class="navbar-brand" href="index.html">Furni<span>.</span></a>
				
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni" aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				
				<div class="collapse navbar-collapse" id="navbarsFurni">
					<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
						<li class="nav-item ">
							<a class="nav-link" href="/">Home</a>
						</li>
						<li><a class="nav-link" href="/shop">Shop</a></li>
						<li><a class="nav-link" href="/blog">Blog</a></li>
						<li><a class="nav-link" href="/contact">Contact us</a></li>
					</ul>
                    <form action="/search" class="row g-1">
                        <div class="col-auto">
                            <input type="text" class="form-control mr-sm-2" name="search" placeholder="search">
                        </div>
                        <div class="col">
                            <p><button class="btn btn-white-outline"><i style="color: white;" class="fas fa-search"></i></button></p>
                               
                        </div>
                     </form>
					<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">
							@if (Auth::user())
						 <li><a class="nav-link" href="/userprofile"><img src="{{ url('/asset/images/user.svg') }}">   {{ Auth::user()->name }}</a></li>
						
						  <li><a class="nav-link" href="/showcart"><img src="{{ url('/asset/images/cart.svg') }}"></a></li>
						@else
						<li><a class="nav-link" href="/furni/login"><img src="{{ url('/asset/images/user.svg') }}"></a></li>
							<li><a class="nav-link" href="/furni/login"><img src="{{ url('/asset/images/cart.svg') }}"></a></li>
						@endif
						
						@if (Auth::guest())
						@else
							<li><a class="btn btn-white-outline" href="/logout">logout</a></li>
                         @endif
						
                    </ul>
                </div>
               
            </div>
            
        </nav>
   
    <!-- End Header/Navigation -->
    <!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    
                    <p class="mb-4">{{ $data->header_text }}</p>
                    <p><a href="/shop" class="btn btn-secondary me-2">Shop Now</a><a href="#"
                            class="btn btn-white-outline">Explore</a></p>
                </div>
            </div>
            <div class="col-lg-7">
                {{-- <div class="hero-img-wrap">
                    <img src="{{ url('/asset/images/couch.png') }}" class="img-fluid">
                </div> --}}
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

    @yield('content')


    <!-- Start Footer Section -->
    <footer class="footer-section">
        <div class="container relative">

            <div class="sofa-img">
                <img src="{{ url('/asset/images/sofa.png') }}" alt="Image" class="img-fluid">
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="subscription-form">
                        <h3 class="d-flex align-items-center"><span class="me-1"><img
                                    src="{{ url('/asset/images/envelope-outline.svg') }}" alt="Image"
                                    class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

                        <form action="#" class="row g-3">
                            <div class="col-auto">
                                <input type="text" name="h" id="h" class="form-control"
                                    placeholder="Enter your name">
                            </div>
                            <div class="col-auto">
                                <input type="email" name="e" id="e" class="form-control"
                                    placeholder="Enter your email">
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary">
                                    <span class="fa fa-paper-plane"></span>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">{{ $data->footer_title }}</a>
                    </div>
                    <p class="mb-4">{{ $data->footer_text }}</p>
                        
                    <ul class="list-unstyled custom-social">
                        <li><a href="{{ $data->facebook }}"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="{{ $data->twitter }}"><span class="fab fa-twitter"></span></a></li>
                        <li><a href="{{ $data->instagram }}"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="{{ $data->linkedin }}"><span class="fab fa-linkedin"></span></a></li>
                    </ul>
                    <ul class="list-unstyled custom-social">
                        
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                                        <path
                                            d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
                                    </svg>
                              
                                <div class="service-contents">
                                    <p>{{ $data->support_email }}</p>
                                </div> <!-- /.service-contents-->
                        
                     
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                    </svg>
                             
                                <div class="service-contents">
                                    <p>{{ $data->support_phone }}</p>
                                </div> <!-- /.service-contents-->
                            
                       
                    </ul>
                </div>

                <div class="col-lg-8">
                    <div class="row links-wrap">
                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="//about">About us</a></li>
                                <li><a href="//services">Services</a></li>
                                <li><a href="//blog">Blog</a></li>
                                <li><a href="//contact">Contact us</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="#">Support</a></li>
                                <li><a href="#">Knowledge base</a></li>
                                <li><a href="#">Live chat</a></li>
                            </ul>
                        </div>

                        <div class="col-6 col-sm-6 col-md-3">
                            <ul class="list-unstyled">
                                <li><a href="#">Jobs</a></li>
                                <li><a href="#">Our team</a></li>
                                <li><a href="#">Leadership</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>

                       
                    </div>
                </div>

            </div>

            <div class="border-top copyright">
                <div class="row pt-4">
                    <div class="col-lg-6">
                        <p class="mb-2 text-center text-lg-start">Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>. All Rights Reserved. &mdash; Designed with love by <a
                                href="https://untree.co">Untree.co</a> Distributed By <a
                                hreff="https://themewagon.com">ThemeWagon</a>
                            <!-- License information: https://untree.co/license/ -->
                        </p>
                    </div>

                    <div class="col-lg-6 text-center text-lg-end">
                        <ul class="list-unstyled d-inline-flex ms-auto">
                            <li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
    </footer>
    <!-- End Footer Section -->
    <script src="{{ url('/asset/js/bootstrap.bundle.min.js') }}"></script>
 
    <script src="{{ url('/asset/js/tiny-slider.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src=" https://1834-124-253-82-196.ngrok-free.app/asset/js/tiny-slider.js"></script> 
    <script src="https://1834-124-253-82-196.ngrok-free.app/asset/js/bootstrap.bundle.min.js"></script> --}}
    {{-- <script src="{{ url('/asset/js/custom.js') }}"></script> --}}

    </body>

</html>
