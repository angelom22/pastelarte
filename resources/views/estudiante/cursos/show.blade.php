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
                        @include('admin.layouts.nav-admin', ['title' => 'Mi curso', 'page' => 'curso'] )
						</div>
						<div class="col-lg-12">
                            <div class="row">
                                <div class="col-xl-8">
                                    @include('custom.message')
                                    <div class="application_statics">
                                        <h4>{{ __("Curso: :curso", ["curso" => $curso->title]) }}</h4>
                                        @include('estudiante.cursos.resources.visor')
                                    </div>
                                    <hr>
                                    @include('estudiante.cursos.resources.comentarios')
                                </div>
                                <div class="col-xl-4">
                                    @include('estudiante.cursos.resources.sidebar')
                                </div>
                            </div>  
                        </div>
                        
					</div>
				</div>
                <div class="row mt10">
                @include('admin.layouts.footer')
                </div>
			</div>
		</div>
    </section>
@endsection


