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
													<li class="list-inline-item">
														<select class="selectpicker show-tick">
															<option>Pastelería</option>
															<option>Decoración de Tortas</option>
														</select>
													</li>
													<!-- <li class="list-inline-item">
														<select class="selectpicker show-tick">
															<option>Recientemente publicado</option>
															<option>Recientes</option>
															<option>Anteriores</option>
														</select>
													</li> -->
													<li class="list-inline-item">
														<div class="candidate_revew_search_box course fn-520">
															<form class="form-inline my-2 my-lg-0">
														    	<input class="form-control mr-sm-2" type="search" placeholder="Buscar curso" aria-label="Search">
														    	<button class="btn my-2 my-sm-0" type="submit"><span class="flaticon-magnifying-glass"></span></button>
														    </form>
														</div>
													</li>

												</ul>
											</div>
										</div>
									</div>
									@include('custom.message')
									@foreach($cursos as $curso)
									<div class="my_course_content_list">
										<div class="mc_content_list">
											<div class="thumb">
												<img  style="width: 307px; height:200px; object-fit: cover;" src="/storage/{{$curso->thumbnail}}" alt="{{$curso->slug}}">
												<div class="overlay">
													<ul class="mb0">
														<!-- Colocar Validación para estos botones -->

														<li class="list-inline-item">
															<a class="mcc_edit" href="#">Editar</a>
														</li>
														<li class="list-inline-item">
															<a class="mcc_view" href="{{route('cursos.show', $curso->slug)}}">Ver</a>
														</li>
													</ul>
												</div>
											</div>
											<div class="details">
												<div class="mc_content">
													<p class="subtitle">Carrera: {{$curso->carrera->title}}</p>
													<h5 class="title">{{$curso->title}}<span><small class="tag">{{$curso->status}}</small></span></h5>
													<p>{!! $curso->extracto !!}</p>
												</div>
												<div class="mc_footer">
													<ul class="mc_meta fn-414">
														<li class="list-inline-item"><a href="#"><i class="flaticon-profile"></i></a></li>
														<li class="list-inline-item"><a href="#">1548</a></li>
														<li class="list-inline-item"><a href="#"><i class="flaticon-comment"></i></a></li>
														<li class="list-inline-item"><a href="#">25</a></li>

													</ul>
													<ul class="mc_review fn-414">
														<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
														<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
														<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
														<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
														<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
														<li class="list-inline-item"><a href="#">(5)</a></li>
														<li class="list-inline-item tc_price fn-414"><a href="#">${{$curso->precio}}</a></li>
														<li class="list-inline-item">
														@can('haveaccess','leccion.create')
															<a href="#"
															class="btn btn-info pull-right"
															title="Añadir Lección"
															data-curso_id="{{$curso->id}}"
															data-toggle="modal" data-target="#CrearLeccion"
															>
                                                        	<i class="fa fa-plus"></i>
														Anadir Lección</a>
														@endcan
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
									@endforeach
									<div class="row">
										<div class="col-lg-12">
											<div class="mbp_pagination mt20">
												<ul class="page_navigation">
													<!-- <li class="page-item disabled">
														<a class="page-link" href="#" tabindex="-1" aria-disabled="true"> <span class="flaticon-left-arrow"></span> Prev</a>
													</li> -->
													{{ $cursos->links() }}
													<!-- <li class="page-item">
														<a class="page-link" href="#">Next <span class="flaticon-right-arrow-1"></span></a>
													</li> -->
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
		console.log(curso_id);

		var modal = $(this);

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