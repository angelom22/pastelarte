<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="escuela de pasteleria, cursos, cursos online, educacion, reposteria, aprendizaje, decoracion de tortas, cupcake cursos, cursos de tortas, pasapalos, educacion online resporteria, estudiantes, entrenamiento, pastel arte, escuela online de pasteleria">
    <meta name="description" content="Pastel Arte - Escuela de pastelería y decoración de tortas">
    <meta name="CreativeLayers" content="ATFN">
    <meta name="author" content="veneztechnology">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="robots" content="index, follow">
    <meta name="google" content="nositelinkssearchbox">
    
    <title>Pastel Arte | Escuela online de pastelería | Decoración de tortas | cursos</title>
    <!-- <title>{{ config('app.name', 'Pastel Arte') }}</title> -->

    <!-- css file -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashbord_navitaion.css')}}">

    <!-- Responsive stylesheet -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">

    <!-- Favicon -->
    <link href="{{asset('img/favicon.ico')}}" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
    <link href="{{asset('img/favicon.ico')}}" sizes="128x128" rel="shortcut icon" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    @stack('css')

</head>

<body>
<div class="wrapper">
	<div class="preloader"></div>

	@yield('content')

<a class="scrollToHome" href="#"><i class="flaticon-up-arrow-1"></i></a>
@include('admin.blog.resources.modal')
</div>

<!-- Wrapper End -->

<script type="text/javascript" src="{{asset('js/jquery-3.3.1.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery-migrate-3.0.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.mmenu.all.js')}}"></script>
<script type="text/javascript" src="{{asset('js/ace-responsive-menu.js')}}"></script>
<script type="text/javascript" src="{{asset('js/chart.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/chart-custome.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap-select.min.js')}}"></script>
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
<script type="text/javascript" src="{{asset('js/wow.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/dashboard-script.js')}}"></script>
<!-- Custom script for all pages --> 
<script type="text/javascript" src="{{asset('js/script.js')}}"></script>
@stack('js')
</body>
</html>