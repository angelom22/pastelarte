@extends('admin.layouts.app')

@push('css')
	<link rel="stylesheet" href="{{asset('plugins/datepicker/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <!-- <link src="{{asset('plugins/bootstrap-datapicker/css/bootstrap-datepicker3.css')}}"> -->
	<link rel="stylesheet" href="{{asset('plugins/select2/dist/css/select2.min.css')}}"  >
    <link rel="stylesheet" href="{{asset('plugins/dropzone/dist/min/dropzone.min.css')}}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.cs')}}s">
	
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
						@include('admin.layouts.nav-admin', ['title' => 'Eventos', 'page' => 'evento'] )
							<nav class="breadcrumb_widgets" aria-label="breadcrumb mb30">
								<h4 class="title float-left">Dashboard</h4>
								<ol class="breadcrumb float-right">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Eventos</li>
								</ol>
							</nav>
						</div>
					</div>
					@include('custom.message')
					<form action="{{ route('EventStore') }}" method="POST" enctype="multipart/form-data" files="true">
					@method('POST')
					@csrf
					
					@include('admin.evento.resources.form',['btnSubmit' => 'Guardar Evento', 'titleform' => 'Crear Evento'])

					</form>	

					<div class="row mt50">
						@include('admin.layouts.footer')
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection

@push('js')


    <script type="text/javascript">
      jQuery(function($) {
        $('.time').mask('99:99');
      });
    </script>


	<script src="{{asset('plugins/datepicker/jquery.maskedinput.min.js')}}"></script>
    <script src="{{asset('plugins/select2/dist/js/select2.min.js')}}"></script>
    <script src="{{asset('plugins/datepicker/jquery-ui.js')}}"></script>
    <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- <script src="{{asset('plugins/bootstrap-datapicker/js/bootstrap-datepicker.min.js')}}"></script> -->
    <!-- bootstrap color picker -->
    <script src="{{asset('plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
	<script src="{{asset('plugins/ckeditor/ckeditor.js')}}"></script>
	<script src="{{asset('plugins/ckeditor/styles.js')}}"></script>
	<script src="{{asset('plugins/dropzone/dist/min/dropzone.min.js')}}"></script>
	<script>
		
        
        CKEDITOR.replace( 'content' );
		
		$('.select2').select2({
            tags: true,
        });
        
        
        $('#fecha').datepicker({
            language: "es",
            autoclose: true
        });

        var token = $('meta[name="csrf-token"]').attr('content');
		console.log(token);

		var MyDropzone = new Dropzone('.dropzone', {
			url: '/evento',
			paramName: 'file',
			// acceptedFiles: 'image/*',
			// maxFilesize:2,
			maxFiles: 1,
			headers: {'X-CSRF-TOKEN':token},

		});

		MyDropzone.on('error', function(file, res){
			console.log(res);
			var msg = res.message;
			$('.dz-error-message:last > span').text(msg);
		});
        
        
		// Disable auto discover for all elements:
            Dropzone.autoDiscover = false;
        
        
	</script>
@endpush