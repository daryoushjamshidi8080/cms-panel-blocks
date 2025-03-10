

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="Aviato E-Commerce Template">

  <meta name="author" content="Themefisher.com">


  <title>@yield('title', '....')</title>

  <!-- Mobile Specific Meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/website/img/favicon.png') }}" />
  <!-- bootstrap.min css -->
  <link rel="stylesheet" href="{{ asset('assets/website/plugins/bootstrap/css/bootstrap.min.css') }}">
  <!-- Ionic Icon Css -->
  <link rel="stylesheet" href="{{ asset('assets/website/plugins/Ionicons/css/ionicons.min.css') }}">
  <!-- animate.css -->
  <link rel="stylesheet" href="{{ asset('assets/website/plugins/animate-css/animate.css') }}">
  <!-- Magnify Popup -->
  <link rel="stylesheet" href="{{ asset('assets/website/plugins/magnific-popup/dist/magnific-popup.css') }}">
  <!-- Owl Carousel CSS -->
  <link rel="stylesheet" href="{{ asset('assets/website/plugins/slick-carousel/slick/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/website/plugins/slick-carousel/slick/slick-theme.css') }}">

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{ asset('assets/website/css/style.css') }}">

  @yield('style')

  <style>
    /* From Uiverse.io by elijahgummer */
        button {
        font: inherit;
        background-color: #f0f0f0;
        border: 0;
        color: #242424;
        border-radius: 0.5em;
        font-size: 1.35rem;
        padding: 0.375em 1em;
        font-weight: 600;
        text-shadow: 0 0.0625em 0 #fff;
        box-shadow: inset 0 0.0625em 0 0 #f4f4f4, 0 0.0625em 0 0 #efefef,
            0 0.125em 0 0 #ececec, 0 0.25em 0 0 #e0e0e0, 0 0.3125em 0 0 #dedede,
            0 0.375em 0 0 #dcdcdc, 0 0.425em 0 0 #cacaca, 0 0.425em 0.5em 0 #cecece;
        transition: 0.15s ease;
        cursor: pointer;
        }
        button:active {
        translate: 0 0.225em;
        box-shadow: inset 0 0.03em 0 0 #f4f4f4, 0 0.03em 0 0 #efefef,
            0 0.0625em 0 0 #ececec, 0 0.125em 0 0 #e0e0e0, 0 0.125em 0 0 #dedede,
            0 0.2em 0 0 #dcdcdc, 0 0.225em 0 0 #cacaca, 0 0.225em 0.375em 0 #cecece;
        }

        .home_menu a{
            /* padding: 20px 45px; */
            margin: 8px  20px;
            font-weight: 700;
            font-size: 18px  !important;
        }
        .name_menu a{
            font-size: 18px !important;
            font-weight: 900 !important;
            margin-top: 8px;

        }

  </style>

</head>

<body id="body">

<!-- Header Start -->
<header class="navigation">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- header Nav Start -->
				<nav class="navbar">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="index.html">
								<img src="{{asset('assets/website/images/logo.png')}}" alt="Logo">
							</a>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
								<li class="home_menu"><a href="{{ route('home') }}">Home</a></li>
								{{-- <li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Portfolio <span class="ion-ios-arrow-down"></span></a>
									<ul class="dropdown-menu">
										<li><a href="portfolio.html">Portfolio Filter</a></li>
										<li><a href="portfolio-single.html">Portfolio Single</a></li>
									</ul>
								</li> --}}
                                @auth
                                    <li class="name_menu">
                                        <a href="{{ route('dashboard') }}">{{ auth()->user()->name }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('logout') }}">
                                            <button>logout</button>
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ route('login') }}">
                                            <button>Login</button>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('register')}}" >
                                            <button>Sign Up</button>
                                        </a>
                                    </li>

                                @endauth


							</ul>
							</div><!-- /.navbar-collapse -->
							</div><!-- /.container-fluid -->
						</nav>
					</div>
				</div>
			</div>
</header><!-- header close -->


@yield('content')

<!-- footer Start -->
<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="footer-manu">
					<ul>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Contact us</a></li>
						<li><a href="#">How it works</a></li>
						<li><a href="#">Support</a></li>
						<li><a href="#">Terms</a></li>
					</ul>
				</div>
				<p class="copyright">Copyright 2018 &copy; Design & Developed by <a href="http://www.themefisher.com">themefisher.com</a>. All rights reserved.
					<br>
					Get More <a href="https://themewagon.com/theme_tag/free/" target="_blank">Free Bootstrap Templates</a>
				</p>
			</div>
		</div>
	</div>
</footer>

    <!--
    Essential Scripts
    =====================================-->

    <!-- <script src="js/jquery.counterup.js"></script> -->

    <!-- Main jQuery -->

    <script src="https://code.jquery.com/jquery-git.min.js"></script>
    <!-- Bootstrap 3.1 -->
    <script src="{{ asset('assets/website/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Owl Carousel -->
    <script src="{{ asset('assets/website/plugins/slick-carousel/slick/slick.min.js') }}"></script>
    <!--  -->
    <script src="{{ asset('assets/website/plugins/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
    <!-- Mixit Up JS -->
    <script src="{{ asset('assets/website/plugins/mixitup/dist/mixitup.min.js') }}"></script>
    <!-- <script src="{{ asset('assets/website/plugins/count-down/jquery.lwtCountdown-1.0.js') }}"></script> -->
    <script src="{{ asset('assets/website/plugins/SyoTimer/build/jquery.syotimer.min.js') }}"></script>


    <!-- Form Validator -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery.form/3.32/jquery.form.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.1/jquery.validate.min.js"></script>



    <!-- Google Map -->
    <script src="{{ asset('assets/website/plugins/google-map/map.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>

    <script src="{{asset('assets/website/js/script.js') }}"></script>




</body>
</html>
