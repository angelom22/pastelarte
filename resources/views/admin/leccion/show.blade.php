@extends('admin.layouts.app')

@push('css')
    <!-- JConfirm -->
    <link rel="stylesheet" href="{{asset('plugins/jconfirm/jConfirm.min.css')}}">
@endpush

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
                            @include('admin.layouts.nav-admin', ['title' => 'Lecciones', 'page' => 'lección'] )
						</div>
						<div class="col-lg-12">
							<div class="my_course_content_container">
								<div class="my_setting_content mb30">
									<div class="table-responsive">
                                    @include('custom.message')
                                        <table class="table table-striped table-bordered">
                                            <thead class="thead-dark">
                                                <tr class="text-center">
                                                    <th>Titulo</th>
                                                    <th>Tipo</th>
                                                    <th>Duración</th>
                                                    <th>Video</th>
                                                    <th>Creación</th>
                                                    <th>Edición</th>
                                                    <th>Acciones</th>
                                                </tr>   
                                            </thead>
                                            <tbody>
                                                @forelse($lecciones as $leccion)
                                                <tr class="text-center">
                                                    <td>{{$leccion->title_leccion}}</td>
                                                    <td>{{$leccion->leccion_type}}</td>
                                                    <td>{{$leccion->duracion_leccion ?? "N/A"}}</td>
                                                    <td>{{$leccion->url_video ?? "N/A"}}</td>
                                                    <td>{{$leccion->created_at->format('d/m/Y H:i')}}</td>
                                                    <td>{{$leccion->updated_at->format('d/m/Y')}}</td>
                                                    <td>
                                                    @can('haveaccess','lesson.edit')
                                                       
                                                        <a
                                                            class="btn btn-outline-dark"
                                                            title="Editar"
                                                            href="{{route('lessonEdit', $leccion)}}" 
                                                        >
                                                            <span class="flaticon-edit"></span> 
                                                        </a>
                                                    @endcan
                                                    @can('haveaccess','lesson.destroy')
                                                    <a
                                                        class="btn btn-outline-danger delete-record"
                                                        title="Eliminar"
                                                        data-route="{{ route('leccion.destroy',  $leccion) }}"
                                                        href="#"
                                                    >
                                                        <span class="flaticon-delete-button"></span>
                                                    </a>
                                                        <!-- <form action="#" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button title="eliminar" class="btn btn-danger btn-sm" onclick="return alert('Esta seguro de querer eliminar este evento?')">
                                                                <span class="flaticon-delete-button"></span>
                                                            </button>
                                                        </form> -->
                                                    @endcan
                                                    </td>
                                                </tr>
                                                @empty
                                                    <tr class="text-center">
                                                        <td colspan="7">
                                                            <div class="empty-results">
                                                            @can('haveaccess','leccion.create')
                                                                <a href="#"
                                                                class="btn btn-info"
                                                                title="Añadir Lección"
                                                                data-toggle="modal" data-target="#CrearLeccion"
                                                                >
                                                                <i class="fa fa-plus"></i>
                                                            Anadir Lección</a>
                                                            @endcan
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    <div class="row text-center">
										<div class="col-lg-12">
											<div class="mbp_pagination mt20">
												<ul class="page_navigation">
                                                @if(count($lecciones))
                                                    {{ $lecciones->links() }}
                                                @endif
												</ul>
											</div> 
										</div>
                                    </div>
                                    <div class="row">
										<div class="col-lg-12">
                                            <a href="{{route('admin.curso')}}" class="my_setting_savechange_btn btn btn-thm3">Regrasar
										    <span class="flaticon-right-arrow-1 ml15"></span></a>
										</div>
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
        </div>
    </section>
    
@endsection


@push('js')


@endpush



