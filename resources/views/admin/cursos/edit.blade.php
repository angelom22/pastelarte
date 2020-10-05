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
                            @include('admin.layouts.nav-admin', ['title' => 'Editar Curso', 'page' => 'curso'] )
						</div>
						<div class="col-lg-12">
							<div class="my_course_content_container">
                                @include('custom.message')
                                <form action="{{ route('CourseUpdate', $curso) }}" method="POST" enctype="multipart/form-data" files="true" id="UpdateCourse">
                                @method('PUT')
                                @csrf
								<div class="my_setting_content mb30">
									<div class="my_setting_content_header">
										<div class="my_sch_title my_profile_select_box col-lg-4">
										<h4>Edición del Curso</h4>
										</div>
										@can('haveaccess','lesson.show')                       
											<a href="{{route('lecciones.show', $curso->id )}}" class="btn btn-primary "><i class="flaticon-preview"></i>
											Ver Lecciones</a>
										@endcan
									</div>

									<div class="row my_setting_content_details pb0">
										<div class="col-xl-12">
											<div class="row">
												<div class="col-xl-6">
												<h4 class="m0"><span {{ $curso->status === 'INHABILITADO' ? 'class=style2' : '' }} ><small class="tag">Status:</small></span>
												<!-- <small class="tag">{{$curso->status}}</small> -->
                                                <select class="selectpicker" name="status" id="status">
                                                    <option value="{{$curso->status}}" {{ old('status', $curso->status) === $curso->status ? 'selected' : ''}}>
                                                        {{$curso->status}}
                                                    </option>
                                                    <option value="1">DISPONIBLE</option>
                                                    <option value="2">INHABILITADO</option>
                                                    <option value="3">PENDIENTE</option>
                                                    <option value="4">RECHAZADO</option>
												</select>
												
                                            	</h4>
												</div>
											</div>
										</div>
									</div>
									<hr>
									<div class="row my_setting_content_details pb0">
										<div class="col-xl-12">
											<div class="row">
												<div class="col-xl-6">
													<div class="my_profile_setting_input form-group">
												    	<label for="title">Titulo del Curso:</label>
												    	<input type="text" class="form-control" id="title" name="title" placeholder="Ej: Curso de Galletas" value="{{old('title', $curso->title)}}" maxlength="50" onkeypress="return soloLetras(event)">
													</div>
													<div class="my_profile_setting_input form-group" >
												    	<label for="duracion_curso">Duración:</label>
														<input type="text" class="form-control time" id="duracion_curso" name="duracion_curso" value="{{old('duracion_curso', $curso->duracion_curso)}}"  placeholder="Ej: hh:mm" onkeypress="return soloNumero(event)">

													</div>
												</div>
												<div class="col-xl-6">
													<div class="my_profile_setting_input form-group">
												    	<label for="precio">Precio:</label>
												    	<input type="text" class="form-control" id="precio" name="precio" placeholder="Ej: $20" pattern="[0-9/.]{0,100}" value="{{old('precio', $curso->precio)}}"  onkeypress="return soloNumero(event)">
													</div>
													<div class="my_profile_setting_input form-group">
												    	<label for="nivel_habilidad">Nivel de Habilidad:</label>
												    	<input type="text" class="form-control" id="nivel_habilidad" name="nivel_habilidad" aria-describedby="phoneNumber" placeholder="Ej: Básico, Avanzado"   value="{{old('nivel_habilidad',  $curso->nivel_habilidad)}}"  maxlength="25" onkeypress="return soloLetras(event)">
													</div>
												</div>
												<div class="col-xl-6">
													<div class="my_profile_setting_input form-group">
												    	<label for="instructor">Intructor:</label>
												    	<input type="text" class="form-control" id="instructor" name="instructor" placeholder="Ej: Chef Beatriz Román"  value="{{old('instructor', $curso->instructor)}}"  maxlength="50" onkeypress="return soloLetras(event)">
													</div>
												</div>
												<div class="col-xl-6">
													<div class="my_profile_setting_input form-group">
												    	<label for="lengueaje">Lenguaje:</label>
												    	<input type="text" class="form-control" id="lengueaje" name="lengueaje" placeholder="Ej: Español" value="{{old('lengueaje', $curso->lenguaje)}}"  maxlength="50" onkeypress="return soloLetras(event)">
													</div>
												</div>
												<div class="col-lg-12">
                                                    <label for="lengueaje">thumbnail:</label>
													<div class="my_profile_setting_input2 form-group">
                                                        <img style="object-fit: cover; object-position: center center;" src="/storage/{{$curso->thumbnail}}" alt="{{$curso->thumbnail}}">
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
												<label for="carrera_id">Carrera:</label><br>
										    	<select class="selectpicker" name="carrera_id" id="carrera_id" >
													@foreach($carreras as $carrera)
													<option value="{{$carrera->id}}"  {{ old('carrera_id', $curso->carrera_id) == $carrera->id ? 'selected' : ''}}>{{$carrera->title}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="my_resume_textarea">
												<div class="form-group">
												    <label for="description">Descripción del Curso:</label>
												    <textarea class="form-control" id="description" name="description" rows="10"  required>{{old('description', $curso->description)}}</textarea>
												</div>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="my_resume_textarea">
												<div class="form-group">
													<label for="extracto">Extracto del Curso:</label>
													<textarea class="form-control" id="extracto" name="extracto" placeholder="Ingresa el extracto del curso" rows="5">{{ old('extracto', $curso->extracto) }}</textarea>
												</div>
											</div>
										</div>
										<div class="col-xl-12">
											<div class="my_profile_setting_input tt_video form-group">
												<label for="url_video_preview_curso">URL Video Preview</label>
												<input type="text" class="form-control" id="url_video_preview_curso" name="url_video_preview_curso" value="{{old('url_video_preview_curso',  $curso->url_video_preview_curso)}}">
											</div>
                                        </div>
									</div>
									<div class="col-lg-12">
										<button type="submit" class="my_setting_savechange_btn btn btn-thm">Actualizar
										<span class="flaticon-right-arrow-1 ml15"></span></button>
										<a href="{{route('admin.curso')}}" class="my_setting_savechange_btn btn btn-thm3">Regrasar
										<span class="flaticon-right-arrow-1 ml15"></span></a>
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

<script src="{{asset('js/UpdateCursos.js')}}"></script>
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
