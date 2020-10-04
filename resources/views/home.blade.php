@extends('layouts.app')

@section('content')

	<!-- SLIDER -->
	@include('layouts.slider')

		<!-- CURSOS -->
	@include('layouts.cursos')

	<!-- SEPARADOR -->
	@include('layouts.separador')

		<!-- CATEGORIAS -->
	@include('layouts.categorias')

	<!-- BLOG -->
	@include('layouts.blog')

	<!-- PARALLAX -->
	@include('layouts.parallax')

	<!-- SUSCRIPCION-->
	@include('layouts.suscripcion')

@endsection
