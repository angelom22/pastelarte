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
								<div class="my_setting_content mb30">
									<div class="my_setting_content_header">
										<div class="my_sch_title">
											<h4 class="m0">Información Basica</h4>
										</div>
									</div>
									<div class="row my_setting_content_details pb0">
										<div class="col-xl-12">
											<div class="row">
												<div class="col-xl-6">
													<div class="my_profile_setting_input form-group">
												    	<label for="title">Titulo del Curso</label>
												    	<input type="text" class="form-control" id="title" name="title" placeholder="Ej: Curso de Galletas">
													</div>
													<div class="my_profile_setting_input form-group">
												    	<label for="duracion">Duración</label>
												    	<input type="text" class="form-control" id="duracion" name="duracion">
													</div>
												</div>
												<div class="col-xl-6">
													<div class="my_profile_setting_input form-group">
												    	<label for="precio">Precio</label>
												    	<input type="text" class="form-control" id="precio" name="precio" placeholder="$89">
													</div>
													<div class="my_profile_setting_input form-group">
												    	<label for="nivel_habilidad">Nivel de Habilidad</label>
												    	<input type="email" class="form-control" id="nivel_habilidad" name="nivel_habilidad" aria-describedby="phoneNumber" placeholder="Ej: Basico, Avanzado">
													</div>
												</div>
												<div class="col-xl-6">
													<div class="my_profile_setting_input form-group">
												    	<label for="instructor">Intructor</label>
												    	<input type="text" class="form-control" id="instructor" name="instructor" placeholder="Chef Beatriz Román">
													</div>
												</div>
												<div class="col-xl-6">
													<div class="my_profile_setting_input form-group">
												    	<label for="lengueaje">Lenguaje</label>
												    	<input type="text" class="form-control" id="lengueaje" name="lengueaje" placeholder="Ej: Español">
													</div>
												</div>
												<div class="col-lg-12">
													<div class="my_profile_setting_input2">
														<form action="/file-upload" class="dropzone">
														  	<div class="fallback">
														    	<input name="thumbnail" type="file">
														  	</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="my_setting_content_header style2">
										<div class="my_sch_title">
											<h4 class="m0">Descripción</h4>
										</div>
									</div>
									<div class="row my_setting_content_details">
										<div class="col-lg-12">
											<div class="my_profile_select_box form-group">
												<label for="carrera">Carrera</label><br>
										    	<select class="selectpicker" name="carrera" id="carrera">
													@foreach($carreras as $carrera)
													<option value="{{$carrera->id}}">{{$carrera->title}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="col-lg-12">
											<div class="my_resume_textarea">
												<div class="form-group">
												    <label for="description">Descripción del Curso</label>
												    <textarea class="form-control" id="description" name="description" rows="7"></textarea>
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
										    	<label for="title_leccion">Titulo</label>
										    	<input type="text" class="form-control" id="title_leccion" name="title_leccion" placeholder="Ej: Preparación y Utensilio">
											</div>
										</div>
										<div class="col-xl-4">
											<div class="my_profile_select_box tt_video form-group">
											<label for="title_leccion">Descripción</label>
										    	<input type="text" class="form-control" id="title_leccion" name="title_leccion" placeholder="Ej: Leccion 1.1: Preparación de la mezcla para la torta">
											</div>
										</div>
										<div class="col-xl-4">
											<div class="my_profile_setting_input form-group">
										    	<label for="url_video">Video URL</label>
										    	<input type="text" class="form-control" id="url_video" name="url_video">
											</div>
										</div>
									    <div class="col-lg-12">
											<button type="submit" class="my_setting_savechange_btn btn btn-thm">Guardar <span class="flaticon-right-arrow-1 ml15"></span></button>
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