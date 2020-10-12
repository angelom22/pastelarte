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
                            @include('admin.layouts.nav-admin', ['title' => 'Cursos', 'page' => 'curso'] )
						</div>
						<div class="col-lg-12">
							<div class="my_course_content_container">
								<div class="my_course_content mb30">
									<div class="my_course_content_header">
										<div class="col-xl-4">
											<div class="instructor_search_result style2">
                                                <h4 class="mt10">Lista de cursos</h4>
                                                @can('haveaccess','course.create')
                                                    <a href="{{route('CourseCreate')}}" class="btn btn-primary pull-left">
                                                        <i class="fa fa-plus"></i>
                                                    Crear Curso</a>
                                                @endcan
                                            </div>

										</div>
										<div class="col-xl-8">
											<div class="candidate_revew_select style2 text-right">
												<ul class="mb0">

													<!-- <li class="list-inline-item">
													 	<select name="carrera" class="selectpicker show-tick">
													 		<option value="2">Pastelería</option>
													 		<option value="3">Decoración de Tortas</option>
													 	</select>
													</li> -->
													<li class="list-inline-item">
														<div class="candidate_revew_search_box course fn-520">
															<!-- BUSCADOR DE CURSOS -->
															<form action="{{route('admin.curso')}}" method="GET" class="form-inline my-2 my-lg-0">
																<input class="form-control mr-sm-2" type="search" placeholder="Buscar Curso" aria-label="Search" aria-describedby="search" name="title">
																<button class="btn my-2 my-sm-0" type="submit"><span class="flaticon-magnifying-glass" id="search" aria-hidden="true"></span></button>
															</form>
														</div>
													</li>
												</ul>
											</div>
										</div>
									</div>
									@include('custom.message')
									<div class="my_course_content_list">
										@forelse($cursos as $curso)
										<div class="mc_content_list">
											<div class="thumb">
												<img style="width: 307px; object-fit: cover;" src="/storage/{{$curso->thumbnail}}" alt="{{$curso->slug}}">
												<div class="overlay">
													<ul class="mb0">
														@can('haveaccess','lesson.edit')
														<li class="list-inline-item">
															<a class="mcc_edit" href="{{route('CourseEdit', $curso)}}">Editar</a>
														</li>
														@endcan
														@can('haveaccess','lesson.show')
														<li class="list-inline-item">
															<a class="mcc_view" href="{{route('cursos.show', $curso->slug)}}">Ver</a>
														</li>
														@endcan
													</ul>
												</div>
											</div>
											<div class="details">
												<div class="mc_content">
													<p class="subtitle">Carrera: {{$curso->carrera->title}}</p>
													<h5 class="title">{{$curso->title}}
														@if($curso->status === '1')
														<span>
															<small class="tag">DISPONIBLE</small>
														</span>
														@elseif($curso->status === '2')
														<span class="style2">
															<small class="tag">INHABILITADO</small>
														</span>
														@elseif($curso->status === '3')
														<span class="style3">
															<small class="tag">PENDIENTE</small>
														</span>
														@elseif($curso->status === '4')
														<span class=style4>
															<small class="tag">RECHAZADO</small>
														</span>
														@endif
														<!-- <span {{ $curso->status === '3' ? 'class=style3' : '' }} >
															<small class="tag">{{$curso->status}}</small>
														</span> -->
													</h5>
													<p>{!! $curso->extracto !!}</p>
												</div>
												<div class="mc_footer">
													<ul class="mc_meta fn-414">
														<li class="list-inline-item"><i class="flaticon-profile"></i></li>
														<li class="list-inline-item">{{$curso->estudiantes_count}}</li>
													</ul>
													<ul class="tc_review fn-414">
														@include('estudiante.cursos.resources.valoraciones', ['rating' => $curso->rating])

													</ul>
													<ul class="tc_review fn-414">
														<li class="list-inline-item tc_price fn-414"><a href="#">${{$curso->precio}}</a></li>
													</ul>
													<ul class="mc_meta fn-414">
														<li class="list-inline-item">
														@can('haveaccess','leccion.create')
															<a href="#"
															class="btn btn-info"
															title="Añadir Lección"
															data-curso_id = "{{$curso->id}}"
															data-curso_title = "{{$curso->title}}"
															data-toggle="modal" data-target="#CrearLeccion"
															>
                                                        	<i class="fa fa-plus"></i>
														Anadir Lección</a>
														@endcan
														</li>
													</ul>
													<ul class="view_edit_delete_list float-right">
														<li class="list-inline-item">
															@can('haveaccess','course.show')
															<a href="{{route('cursos.show', $curso->slug)}}" data-toggle="tooltip" data-placement="top" title="Ver" data-original-title="View"><span class="flaticon-preview"></span></a>
															@endcan
														</li>
														<li class="list-inline-item">
															@can('haveaccess','course.edit')
															<a href="{{route('CourseEdit', $curso)}}" data-toggle="tooltip" data-placement="top" title="Editar" data-original-title="Edit"><span class="flaticon-edit"></span></a>
															@endcan
														</li>
									    				<li class="list-inline-item">
														@can('haveaccess','course.destroy')
															<a
															class="btn btn btn-sm btn-danger delete-record"
															title="Eliminar"
															data-route="{{route('cursos.destroy', $curso)}}"
															href="#"
															>
																<span class="flaticon-delete-button"></span>
															</a>
															<!-- <form action="{{route('cursos.destroy', $curso)}}" method="POST" style="display: inline;">
																@csrf
																@method('DELETE')
																<button title="Eliminar" class="btn btn-sm btn-danger" data-original-title="Delete" onclick="return alert('Esta seguro de querer eliminar este cuso?')">
																<span class="flaticon-delete-button"></span>
																</button>
															</form> -->
														@endcan
														</li>
									    			</ul>
												</div>
											</div>
										</div>
										@empty
										<div class="col-12">
											<div class="empty-results">
												<h3><strong> No ha cursos para listar...!</strong></h3>
											</div>
										</div>
										@endforelse
									</div>

									<div class="row">
										<div class="col-lg-12">
											<div class="mbp_pagination mt20">
												<ul class="page_navigation">
												@if(count($cursos))
                                        			{{ $cursos->links() }}
                                    			@endif
												</ul>
											</div>
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
@include('admin.cursos.resources.modal')
@endsection

@push('js')

<script src="{{asset('plugins/datepicker/jquery.maskedinput.min.js')}}"></script>
<script>
	$('.time').mask('99:99');

	// Modal para crear lección
	$('#CrearLeccion').on('show.bs.modal', function(event){
		var button = $(event.relatedTarget);
		var curso_id = button.data('curso_id');
		let curso_title = button.data('curso_title');

		var modal = $(this);
		modal.find('.modal-body').val(curso_title);
		// document.getElementById("caja_valor").value = curso_title;
        modal.find('.modal-body #curso_id').val(curso_id);
	});

	// Para que la modal se quede fija si hay errores
	// if(window.location.hash === '#formLesson')
	// {
	// 	$('#CrearLeccion').modal('show');
	// }

	// $('#CrearLeccion').on('hide.bs.modal', function(){
	// 	window.location.hash = '#';
	// });

	// $('#CrearLeccion').on('shown.bs.modal', function(){
	// 	$('#email').focus();
	// 	window.location.hash = '#formLesson';
	// });
</script>

<script src="{{asset('js/validate-lesson.js')}}"></script>

@endpush