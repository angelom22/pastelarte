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
                            @include('admin.layouts.nav-admin', ['title' => 'Carreras', 'page' => 'carrera'] )
						</div>
						<div class="col-lg-12">
							<div class="my_course_content_container">
								<div class="my_setting_content mb30">
									<div class="my_setting_content_header">
										<div class="my_sch_title">
											<h4 class="m0">Información básica para la carrera</h4>
										</div>
									</div>
									@include('custom.message')
									<form action="{{ route('careerStore') }}" method="POST" enctype="multipart/form-data" files="true" id="formCareer">
									@method('POST')
									@csrf
									<div class="row my_setting_content_details pb0">
										<div class="col-xl-12">
											<div class="row">
												<div class="col-xl-6">
													<div class="my_profile_setting_input form-group">
												    	<label for="title">Titulo de la carrera:</label>
												    	<input type="text" class="form-control" id="title" name="title" placeholder="Ej: Pastelería" value="{{old('title')}}" maxlength="120" onkeypress="return soloLetras(event)">
                                                    </div>
                                                    <div class="my_profile_setting_input tt_video form-group">
                                                        <label for="url_video_preview_carrera">URL Video Preview</label>
                                                        <input type="text" class="form-control" id="url_video_preview_carrera" name="url_video_preview_carrera" value="{{old('url_video_preview_carrera')}}">
                                                    </div>
												</div>
												<div class="col-xl-6">
                                                    <div class="my_profile_setting_input form-group">
												    	<label for="precio">Precio:</label>
												    	<input type="text" class="form-control" id="precio" name="precio" placeholder="Ej: $89" pattern="[0-9]{0,100}" value="{{old('precio')}}"  onkeypress="return soloNumero(event)">
                                                    </div>
                                                
												</div>
												
												
												<!-- <div class="col-lg-12">
													<div class="my_profile_setting_input2 form-group">
														<label for="lengueaje">thumbnail:</label>
														  	<div class="fallback">
														    	<input name="thumbnail" type="file" value="{{old('thumbnail')}}">
														  	</div>
													</div>
												</div> -->
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
											<div class="my_resume_textarea">
												<div class="form-group">
												    <label for="description">Descripción del Curso:</label>
												    <textarea class="form-control" id="description" name="description" rows="10"  required>{{old('description')}}</textarea>
												</div>
											</div>
										</div>
										
						
									</div>
									<div class="col-lg-12">
										<button type="submit" class="my_setting_savechange_btn btn btn-thm">Crear
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
<script src="{{asset('js/validate-career.js')}}"></script>
<script src="{{asset('plugins/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('plugins/ckeditor/styles.js')}}"></script>

<script>
	CKEDITOR.replace( 'description' );
</script>

@endpush

