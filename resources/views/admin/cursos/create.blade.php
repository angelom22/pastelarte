@extends('admin.layouts.app')

@push('css')
 <!-- PNotify -->
 <link href="{{asset('plugins/pnotify/dist/PNotifyBrightTheme.css')}}" rel="stylesheet" type="text/css" />
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
								<div class="my_setting_content mb30">
									<div class="my_setting_content_header">
										<div class="my_sch_title">
											<h4 class="m0">Información Basica</h4>
										</div>
									</div>
									<form action="{{ route('CourseStore') }}" method="POST" enctype="multipart/form-data" files="true" id="formCourse">
									@method('POST')
									@csrf
									<div class="row my_setting_content_details pb0">
										<div class="col-xl-12">
											<div class="row">
												<div class="col-xl-6">
													<div class="my_profile_setting_input form-group">
												    	<label for="title">Titulo del Curso:</label>
												    	<input type="text" class="form-control" id="title" name="title" placeholder="Ej: Curso de Galletas" value="{{old('title')}}" maxlength="50" onkeypress="return soloLetras(event)">
													</div>
													<div class="my_profile_setting_input form-group" >
												    	<label for="duracion_curso">Duración:</label>
														<input type="text" class="form-control time" id="duracion_curso" name="duracion_curso" value="{{old('duracion_curso')}}"  placeholder="Ej: 30:00" onkeypress="return soloNumero(event)">
						
													</div>
												</div>
												<div class="col-xl-6">
													<div class="my_profile_setting_input form-group">
												    	<label for="precio">Precio:</label>
												    	<input type="text" class="form-control" id="precio" name="precio" placeholder="Ej: $89" pattern="[0-9]{0,100}" value="{{old('precio')}}"  onkeypress="return soloNumero(event)">
													</div>
													<div class="my_profile_setting_input form-group">
												    	<label for="nivel_habilidad">Nivel de Habilidad:</label>
												    	<input type="text" class="form-control" id="nivel_habilidad" name="nivel_habilidad" aria-describedby="phoneNumber" placeholder="Ej: Básico, Avanzado"   value="{{old('nivel_habilidad')}}"  maxlength="25" onkeypress="return soloLetras(event)">
													</div>
												</div>
												<div class="col-xl-6">
													<div class="my_profile_setting_input form-group">
												    	<label for="instructor">Intructor:</label>
												    	<input type="text" class="form-control" id="instructor" name="instructor" placeholder="Ej: Chef Beatriz Román"  value="{{old('instructor')}}"  maxlength="50" onkeypress="return soloLetras(event)">
													</div>
												</div>
												<div class="col-xl-6">
													<div class="my_profile_setting_input form-group">
												    	<label for="lengueaje">Lenguaje:</label>
												    	<input type="text" class="form-control" id="lengueaje" name="lengueaje" placeholder="Ej: Español" value="{{old('lengueaje')}}"  maxlength="50" onkeypress="return soloLetras(event)">
													</div>
												</div>
												<div class="col-lg-12">
													<div class="my_profile_setting_input2 form-group">
														<label for="lengueaje">thumbnail:</label>
														  	<div class="fallback">
														    	<input name="thumbnail" type="file" value="{{old('thumbnail')}}">
														  	</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="my_setting_content_header style2">
										<div class="my_sch_title">
											<h4 class="m0">Descripción:</h4>
										</div>
									</div>
									<div class="row my_setting_content_details">
										<div class="col-lg-12">
											<div class="my_profile_select_box form-group">
												<label for="carrera">Carrera:</label><br>
										    	<select class="selectpicker" name="carrera" id="carrera" >
													@foreach($carreras as $carrera)
													<option value="{{$carrera->id}}"  {{ old('carrera') == $carrera->id ? 'selected' : ''}}>{{$carrera->title}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="my_resume_textarea">
												<div class="form-group">
												    <label for="description">Descripción del Curso:</label>
												    <textarea class="form-control" id="description" name="description" rows="10"  required>{{old('description')}}</textarea>
												</div>
											</div>
										</div>
									</div>
									<div class="my_setting_content_header style2">
										<div class="my_sch_title">
											<h4 class="m0">Lecciones</h4>
										</div>
									</div>
									<div class="row my_setting_content_details">
										<div class="col-xl-4">
											<div class="my_profile_setting_input form-group">
										    	<label for="title_leccion">Titulo:</label>
										    	<input type="text" class="form-control" id="title_leccion" name="title_leccion" placeholder="Ej: Preparación y Utensilio" value="{{old('title_leccion')}}"  maxlength="50" onkeypress="return soloLetras(event)">
											</div>
										</div>
										<div class="col-xl-4">
											<div class="my_profile_setting_input tt_video form-group">
											<label for="desciption_leccion">Descripción de la lección:</label>
										    	<input type="text" class="form-control" id="desciption_leccion" name="desciption_leccion" placeholder="Ej: Leccion 1.1: Preparación de la mezcla para la torta" value="{{old('desciption_leccion')}}" >
											</div>
										</div>
										<div class="col-xl-4">
											<div class="my_profile_setting_input tt_video form-group">
											<label for="duracion_leccion">Duración:</label>
										    	<input type="text" class="form-control time" id="duracion_leccion" name="duracion_leccion" placeholder="Ej: 05:30" value="{{old('duracion_leccion')}}" onkeypress="return soloNumero(event)">
											</div>
										</div>
										<div class="col-xl-6">
											<div class="my_profile_setting_input tt_video form-group">
										    	<label for="url_video">Video URL:</label>
										    	<input type="text" class="form-control" id="url_video" name="url_video" value="{{old('url_video')}}">
											</div>
										</div>
									    <div class="col-lg-12">
											<button type="submit" class="my_setting_savechange_btn btn btn-thm">Guardar <span class="flaticon-right-arrow-1 ml15"></span></button>
									    </div>
									</div>
									</form>
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
<script src="{{asset('js/CrearCursos.js')}}"></script>
<script src="{{asset('plugins/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('plugins/ckeditor/styles.js')}}"></script>
<script src="{{asset('plugins/datepicker/jquery.maskedinput.min.js')}}"></script>
<!-- PNotify -->
<script type="text/javascript" src="{{asset('plugins/pnotify/dist/iife/PNotify.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/pnotify/dist/iife/PNotifyButtons.js')}}"></script>


<script>
	CKEDITOR.replace( 'description' );

	$('.time').mask('99:99');
</script>

@endpush