@extends('layouts.app')

@section('content')

	<!-- SLIDER -->
	@include('layouts.slider')

	<!-- CATEGORIAS -->
	@include('layouts.categorias')

	<!-- SEPARADOR -->
	@include('layouts.separador')

	<!-- CURSOS -->
	@include('layouts.cursos')

	<!-- BLOG -->
	@include('layouts.blog')

	<!-- PARALLAX -->
	@include('layouts.parallax')

	<!-- SUSCRIPCION-->
	@include('layouts.suscripcion')

<a class="scrollToHome" href="#"><i class="flaticon-up-arrow-1"></i></a>
@endsection
