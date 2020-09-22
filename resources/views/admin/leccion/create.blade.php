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
                            @include('admin.layouts.nav-admin', ['title' => 'Lecciones', 'page' => 'lección'] )
						</div>
						<div class="col-lg-12">
							<div class="my_course_content_container">
								<div class="my_setting_content mb30">
									<div class="my_setting_content_header">
										<div class="my_sch_title">
											<h4 class="m0">Lección de : <strong>{{$id->title}}</strong></h4>
										</div>
									</div>
									@include('custom.message')
									<form action="{{ route('lessonStore') }}" method="POST" enctype="multipart/form-data" files="true" id="formLesson">
									@method('POST')
                                    @csrf
                                    <input type="hidden" name="curso_id" value="{{$id->id}}">
									<div class="row my_setting_content_details pb0">
										<div class="col-xl-12">
											<!-- <div class="row"> -->
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="title_leccion">Nombre Leccion</label>
                                                    <input type="text" class="form-control" id="title_leccion" name="title_leccion" placeholder="Ej: Preparación y Utensilios" value="{{old('title_leccion')}}" maxlength="50" onkeypress="return soloLetras(event)">
                                                </div>
                                        </div>
                                            <div class="col-xl-12">
                                                <div class="my_profile_setting_input form-group">
                                                    <label for="description_leccion">Descripción</label>
                                                    <input type="text" class="form-control" id="description_leccion" name="description_leccion" placeholder="Ej: Lección 1.1 Preparación de mezcla" maxlength="120" value="{{old('description_leccion')}}">
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="my_profile_setting_input  form-group">
                                                    <label for="duration_leccion">Duración</label>   	
                                                    <input type="text" class="form-control time" id="duration_leccion" name="duration_leccion" value="{{old('duration_leccion')}}"  placeholder="Ej: 30:00" onkeypress="return soloNumero(event)">
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="my_profile_setting_input tt_video form-group">
                                                    <label for="url_video">Video URL</label>
                                                    <input type="text" class="form-control" id="url_video" name="url_video" value="{{old('url_video')}}">
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

<script>
	$('.time').mask('99:99');
</script>

@endpush

