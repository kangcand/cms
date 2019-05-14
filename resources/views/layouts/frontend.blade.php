	<!DOCTYPE html>
	<html lang="zxx" class="no-js')}}">

	<head>
	    <!-- Mobile Specific Meta -->
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <!-- Favicon-->
	    <link rel="shortcut icon" href="img/fav.png')}}">
	    <!-- Author Meta -->
	    <meta name="author" content="codepixer">
	    <!-- Meta Description -->
	    <meta name="description" content="">
	    <!-- Meta Keyword -->
	    <meta name="keywords" content="">
	    <!-- meta character set -->
	    <meta charset="UTF-8">
	    <!-- Site Title -->
	    <title>Assalaam</title>

	    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
	    <!--
			CSS
			============================================= -->
	    <link rel="stylesheet" href="{{ asset('assets/frontend/css/linearicons.css')}}">
	    <link rel="stylesheet" href="{{ asset('assets/frontend/css/font-awesome.min.css')}}">
	    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.css')}}">
	    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.css')}}">
	    <link rel="stylesheet" href="{{ asset('assets/frontend/css/nice-select.css')}}">
	    <link rel="stylesheet" href="{{ asset('assets/frontend/css/hexagons.min.css')}}">
	    <link rel="stylesheet" href="{{ asset('assets/frontend/css/animate.min.css')}}">
	    <link rel="stylesheet" href="{{ asset('assets/frontend/css/owl.carousel.css')}}">
	    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css')}}">
	    @yield('css')
	</head>

	<body>
	    <!-- #header -->
	    @include('layouts.frontend.navbar')
	    <!-- #end-header -->

	    <!-- Content -->
	    @yield('content')
	    <!-- end Content -->

	    <!-- start footer Area -->
	    @include('layouts.frontend.footer')
	    <!-- End footer Area -->

	    <script src="{{ asset('assets/frontend/js/vendor/jquery-2.2.4.min.js')}}"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
	        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
	    </script>
	    <script src="{{ asset('assets/frontend/js/vendor/bootstrap.min.js')}}"></script>
	    <script type="text/javascript"
	        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
	    <script src="{{ asset('assets/frontend/js/easing.min.js')}}"></script>
	    <script src="{{ asset('assets/frontend/js/hoverIntent.js')}}"></script>
	    <script src="{{ asset('assets/frontend/js/superfish.min.js')}}"></script>
	    <script src="{{ asset('assets/frontend/js/jquery.ajaxchimp.min.js')}}"></script>
	    <script src="{{ asset('assets/frontend/js/jquery.magnific-popup.min.js')}}"></script>
	    <script src="{{ asset('assets/frontend/js/owl.carousel.min.js')}}"></script>
	    <script src="{{ asset('assets/frontend/js/hexagons.min.js')}}"></script>
	    <script src="{{ asset('assets/frontend/js/jquery.nice-select.min.js')}}"></script>
	    <script src="{{ asset('assets/frontend/js/jquery.counterup.min.js')}}"></script>
	    <script src="{{ asset('assets/frontend/js/waypoints.min.js')}}"></script>
	    <script src="{{ asset('assets/frontend/js/mail-script.js')}}"></script>
	    <script src="{{ asset('assets/frontend/js/main.js')}}"></script>
	    @yield('js')
	</body>

	</html>
