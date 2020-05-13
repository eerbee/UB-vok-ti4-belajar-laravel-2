<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
	<title>Simple Inventory</title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/icon" href="assets/images/favicon.ico"/>
	<!-- Font Awesome -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	<link href="{{asset('assets/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">
	<!-- Slick slider -->
	<link href="{{asset('assets_public/css/slick.css')}}" rel="stylesheet">
	<!-- Gallery Lightbox -->
	<link href="{{asset('assets_public/css/magnific-popup.css')}}" rel="stylesheet">
	<!-- Skills Circle CSS  -->
	<link rel="stylesheet" type="text/css" href="https://unpkg.com/circlebars@1.0.3/dist/circle.css">

	<!-- Main Style -->
	<link href="{{asset('assets_public/css/style.css')}}" rel="stylesheet">

	<!-- Google Fonts Raleway -->
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,400i,500,500i,600,700" rel="stylesheet">
	<!-- Google Fonts Open sans -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700,800" rel="stylesheet">

	@laravelPWA
</head>
<body>
	<!-- HEADER-->
	@include('public.layouts.navbar')
	<!-- END HEADER-->

	<!-- MAIN CONTENT-->
    @yield('content')
    <!-- END MAIN CONTENT-->

    <!-- Start footer -->
	<footer id="mu-footer">
		<div class="mu-footer-top">
			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<div class="mu-single-footer">
							<img class="mu-footer-logo" src="{{asset('assets_public/images/logo.png')}}" alt="logo" width="65px" height="65px">
							<span style="color: #fff; font-weight: 600; font-size: 26px;">simple inventory</span>
							<p style="margin-top: -20px;">“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
							<div class="mu-social-media">
								<a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
								<a class="mu-twitter" href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
								<a class="mu-pinterest" href="https://id.pinterest.com/"><i class="fa fa-pinterest-p"></i></a>
								<a class="mu-google-plus" href="https://www.google.com/"><i class="fa fa-google"></i></a>
								<a class="mu-youtube" href="https://www.youtube.com/"><i class="fa fa-youtube"></i></a>
							</div>
						</div>
					</div>
					<div class="col-md-2">
						
					</div>
					<div class="col-md-3">
						<div class="mu-single-footer">
							<h3>Useful link</h3>
							<ul class="mu-useful-links">
								<li>
									<a href="https://ub.ac.id/id/">Universitas Brawijaya</a>
								</li>
								<li><a href="https://vokasi.ub.ac.id/">Program Pendidikan Vokasi</a></li>
								<li><a href="https://siam.ub.ac.id/">SIAM UB</a></li>
								<li><a href="https://www.kemdikbud.go.id/">Kemendikbud</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-3">
						<div class="mu-single-footer">
							<h3>Contact Information</h3>
							<ul class="list-unstyled">
							  <li class="media">
							    <span class="fa fa-home"></span>
							    <div class="media-body">
							    	<p>	Universitas Brawijaya, <br>
										Jl. Veteran No.12-14, Ketawanggede, <br>
										Kec. Lowokwaru, Kota Malang, Jawa Timur 65145, <br>
										Indonesia <br>
									</p>
							    </div>
							  </li>
							  <li class="media">
							    <span class="fa fa-phone"></span>
							    <div class="media-body">
							       <p>+62 2181286041100</p> 
							       <p>Fax. +6221 5731228</p>
							    </div>
							  </li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="mu-footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-footer-bottom-area">
							<p class="mu-copy-right">&copy; Copyright <a rel="nofollow" href="http://markups.io">markups.io</a>. All right reserved.</p>
						</div>
					</div>
				</div>
			</div>
		</div>

	</footer>
	<!-- End footer -->

	<!-- JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
	<!-- Slick slider -->
    <script type="text/javascript" src="{{asset('assets_public/js/slick.min.js')}}"></script>
    <!-- Progress Bar -->
    <script src="https://unpkg.com/circlebars@1.0.3/dist/circle.js"></script>
    <!-- Filterable Gallery js -->
    <script type="text/javascript" src="{{asset('assets_public/js/jquery.filterizr.min.js')}}"></script>
    <!-- Gallery Lightbox -->
    <script type="text/javascript" src="{{asset('assets_public/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- Counter js -->
    <script type="text/javascript" src="{{asset('assets_public/js/counter.js')}}"></script>
    <!-- Ajax contact form  -->
    <script type="text/javascript" src="{{asset('assets_public/js/app.js')}}"></script>
	
    <!-- Custom js -->
	<script type="text/javascript" src="{{asset('assets_public/js/custom.js')}}"></script>
</body>
</html>