<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'/>
    <meta name="keywords" content="escuela de pasteleria, cursos, cursos online, educacion, reposteria, aprendizaje, decoracion de tortas, cupcake cursos, cursos de tortas, pasapalos, educacion online resporteria, estudiantes, entrenamiento, pastel arte, escuela online de pasteleria">
    <meta name="description" content="@yield('meta_description', 'Pastel Arte - Escuela de pastelería y decoración de tortas')">
    <meta name="robots" content="index, follow">
    <meta name="google" content="nositelinkssearchbox">
    <!-- css file -->
    
    <title>@yield('meta_title',  "Pastel Arte | Escuela online de pastelería | Decoración de tortas | cursos" )
    </title>
    <!-- <title>Pastel Arte | Escuela online de pastelería | Decoración de tortas | cursos</title> -->
    <!-- <title>{{ config('app.name', 'Pastel Arte') }}</title> -->

    <!-- css file -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

    <!-- Responsive stylesheet -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">

    <!-- Favicon -->
    <link href="{{asset('img/favicon.ico')}}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
    <link href="{{asset('img/favicon.ico')}}" sizes="128x128" rel="shortcut icon" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Menesaje ToastrJS -->
    <link rel="stylesheet" href="{{asset('plugins/toastrJS/build/toastr.min.css')}}">

    @stack('css')
</head>
<body>
<div class="wrapper">
	<div class="preloader"></div>

	<!-- Our Error Page -->
	<section class="our-error bg-img6">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 offset-sm-4 col-lg-6 offset-lg-5 text-center">
					<div class="logo-widget error_paged">
				        <a href="{{ url('/') }}" class="navbar_brand float-left">
				            <img class="logo1 img-fluid" src="{{asset('img/header-logo.png')}}" alt="header-logo.png">
				            <span>Pastel Arte</span>
				        </a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center">
					<div class="error_page footer_apps_widget">
						<div class="erro_code"><h1>404</h1></div>
						<h4>Lo sentimos, página no encontrada</h4>
						<p>Lamentablemente, no se pudo encontrar la página que buscaba. Puede que no esté disponible temporalmente, se haya movido o ya no exista. Verifique que no haya errores en la URL que ingresó y vuelva a intentarlo.</p>
						<form class="form-inline mailchimp_form">
							<label class="sr-only" for="inlineFormInputMail3">Nombre</label>
							<input type="email" class="form-control mb-2 mr-sm-2" id="inlineFormInputMail3" placeholder="Enter your email address">
							<button type="submit" class="btn btn-primary mb-2"><span class="flaticon-right-arrow-1"></span></button>
						</form>
					</div>
					<a class="color-white mt25" href="{{ url('/') }}">Regresar al inicio <span class="flaticon-right-arrow-1 pl10"></span></a>
				</div>
			</div>
		</div>
	</section>
<a class="scrollToHome" href="#"><i class="flaticon-up-arrow-1"></i></a>
</div>
<!-- Wrapper End -->
<script type="text/javascript" src="{{asset('js/jquery-3.3.1.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery-migrate-3.0.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.mmenu.all.js')}}"></script>
<script type="text/javascript" src="{{asset('js/ace-responsive-menu.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap-select.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/isotop.js')}}"></script>
<script type="text/javascript" src="{{asset('js/snackbar.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/simplebar.js')}}"></script>
<script type="text/javascript" src="{{asset('js/parallax.js')}}"></script>
<script type="text/javascript" src="{{asset('js/scrollto.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery-scrolltofixed-min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.counterup.js')}}"></script>
<script type="text/javascript" src="{{asset('js/wow.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/progressbar.js')}}"></script>
<script type="text/javascript" src="{{asset('js/slider.js')}}"></script>
<script type="text/javascript" src="{{asset('js/timepicker.js')}}"></script>
<!-- Custom script for all pages --> 
<script type="text/javascript" src="{{asset('js/script.js')}}"></script>
</body>
</html>