@extends('admin.layouts.app')

@section('content')

	<!-- Main Header Nav -->
	@include('admin.layouts.header-nav')

	<!-- Main Header Nav For Mobile -->
	@include('admin.layouts.header-nav-mobile')

	<!-- Our Dashbord -->
	<section class="our-dashbord dashbord pb50">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12 col-lg-4 col-xl-2 dn-smd pl0">
					@include('admin.layouts.menu-lateral')
				</div>
				<div class="col-sm-12 col-lg-8 col-xl-10">
					<div class="row">
						<div class="col-lg-12">
							@include('admin.layouts.menu-lateralMobil')
						</div>
						<div class="col-lg-12">
						@include('admin.layouts.nav-admin', ['title' => 'Inicio', 'page' => 'inicio'] )
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="ff_one">
								<div class="icon"><span class="flaticon-user"></span></div>
								<div class="detais">
									<p>Usuarios</p>
									<div class="timer">{{$users->count()}}</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="ff_one style3">
								<div class="icon"><span class="flaticon-online-learning"></span></div>
								<div class="detais">
									<p>Cursos Pagos</p>
									<div class="timer">{{$cursosPagos}}</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="ff_one style2">
								<div class="icon"><span class="flaticon-online-learning"></span></div>
								<div class="detais">
									<p>Cursos Gratis</p>
									<div class="timer">{{$cursosGratis}}</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="ff_one style4">
								<div class="icon"><span class="flaticon-online-money"></span></div>
								<div class="detais">
									<p>Ganancia $</p>
									<div class="timer">{{$ganaciaTotal}}</div>
								</div>
							</div>
						</div>

						<div class="col-xl-8">
							@include('admin.dashboard.charts')
						</div>

						<div class="col-xl-4">
							<div class="recent_job_activity">
								<h4 class="title">Últimos Usuarios Registrados</h4>
								@forelse($users as $user)
								<div class="grid">
									<ul>
										<li><div class="icon title"><span class="flaticon-user"></span><p>{{$user->name}} / {{$user->email}}</p></div></li>
									</ul>
								</div>
								@empty
								<div class="grid">No hay usuarios registrados</div>
								@endforelse
							</div>
						</div>
					</div>
					<div class="row mt50">
						@include('admin.layouts.footer')
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection