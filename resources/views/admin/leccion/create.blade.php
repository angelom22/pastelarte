@extends('admin.layouts.app')

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"/>
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
									@include('custom.message')
									<form action="{{ route('lessonStore') }}" method="POST" enctype="multipart/form-data" files="true" id="formLesson">
									@method('POST')
                                    @csrf
									<div class="my_setting_content_header">
										<div class="my_sch_title">
											<h4 class="m0">Curso: 
											<div class="my_profile_select_box form-group">
												<!-- <label for="curso_id">Curso</label><br> -->
												<select class="selectpicker" name="curso_id" id="curso_id">
													@foreach($cursos as $curso)
													<option value="{{$curso->id}}">{{$curso->title}}</option>
													@endforeach
												</select>
											</div>
											</h4>
										</div>
									</div>
									
                                    	
									<div class="row my_setting_content_details pb0">
										
										<div class="col-xl-12">
											<!-- <div class="row"> -->
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="title_leccion">Nombre Leccion</label>
                                                    <input type="text" class="form-control" id="title_leccion" name="title_leccion" placeholder="Ej: Preparación y Utensilios" value="{{old('title_leccion')}}" maxlength="100">
                                                </div>
										</div>
										<div class="col-lg-12">
											<div class="my_profile_select_box form-group">
												<label for="leccion_type">Tipo de Lección</label><br>
												<select class="selectpicker" name="leccion_type" id="leccion_type">
													<option value="VIDEO">Video</option>
													<option value="ZIP">ZIP ó Archivo</option>
												</select>
											</div>
										</div>
                                            <div class="col-xl-12">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="description_leccion">Descripción</label>
                                                    <input type="text" class="form-control" id="description_leccion" name="description_leccion" placeholder="Ej: Lección 1.1 Preparación de mezcla" maxlength="120" value="{{old('description_leccion')}}">
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
												<label for="duracion_leccion">Duración</label>
												<div class="input-group form-group">
													<div class="input-group-prepend">
														<div class="input-group-text">
															<i class="fa fa-clock-o" aria-hidden="true"></i>
														</div>
													</div>
													<input id="duracion_leccion" name="duracion_leccion" value="{{old('duracion_leccion')}}" class="form-control" placeholder="Duración de la unidad si es vídeo" name="unit_time" type="number" onkeypress="return soloNumero(event)">
												</div>   
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="my_profile_setting_input tt_video form-group">
                                                    <label for="url_video">Video URL</label>
                                                    <input type="text" class="form-control" id="url_video" name="url_video" value="{{old('url_video')}}">
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
												<div class="custom-file">
													<label class="custom-file-label" for="file">Subir Archivo</label>
													<input type="file" id="file" name="file" class="custom-file-input">
												</div>
                                            </div>
                                        </div>        
                                    </div>
							</div>
						</div>
					</div>
                    <div class="col-lg-12">
                        <button type="submit" class="my_setting_savechange_btn btn btn-thm">Añadir
                        <span class="flaticon-right-arrow-1 ml15"></span></button>
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
<script src="{{asset('plugins/datepicker/jquery.maskedinput.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
	$(document).ready(function() {
		$('#description_leccion').summernote({
			height: 200,
		});
		$('.time').mask('99:99');
    });
</script>

@endpush



