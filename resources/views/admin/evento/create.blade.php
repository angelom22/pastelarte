@extends('admin.layouts.app')

@push('css')
	<link rel="stylesheet" href="{{asset('plugins/datepicker/jquery-ui.css')}}">
	<link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
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
							<nav class="breadcrumb_widgets" aria-label="breadcrumb mb30">
								<h4 class="title float-left">Dashboard</h4>
								<ol class="breadcrumb float-right">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</nav>
						</div>
					</div>
					@include('custom.message')
					<form action="{{ route('EventStore') }}" method="POST" enctype="multipart/form-data" files="true">
					@method('POST')
					@csrf
					
					<div class="card text-white bg-dark">
						<div class="card-body">
							<div class="col-md-12">	
							
								<h4 style="color: #fff;">Crear Evento</h4>	
										<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
											<input type="text" class="form-control" id="title" name="title" placeholder="Titulo de la publicación" value="{{ old('title') }}">
											{!! $errors->first('title', '<span class="help-block">:message</span>') !!}
											
										</div>
									
										<div class="form-group {{ $errors->has('content') ? 'has-error' : ''}}">
											<textarea rows="10" class="form-control" id="content" name="content" placeholder="Ingresa contenido de la publicación">{{ old('content') }}</textarea>
											{!! $errors->first('content', '<span class="help-block">:message</span>') !!}
										</div>
							</div>
							<div class="col-md-8">
									<div class="form-group {{ $errors->has('extracto') ? 'has-error' : ''}}">
										<textarea class="form-control" id="extracto" name="extracto" placeholder="Ingresa el extracto de la publicación">{{ old('extracto') }}</textarea>
										{!! $errors->first('extracto', '<span class="help-block">:message</span>') !!}
									</div>

									<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
										<label for="category_id">Categorias</label>
										<select name="category_id" id="category_id" class="form-control select2">
											<option value="">Seleccione Categoria</option>
											@foreach($categories as $category)
											<option value="{{$category->id}}" {{ old('category_id') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
											@endforeach
										</select>
										{!! $errors->first('category_id', '<span class="help-block">:message</span>') !!}
									</div> 
	
									<div class="form-group">
										<label for="tag_id">Etiquetas</label>
										<select multiple="multiple" name="tag_id[]" id="tag_id" class="form-control select2">
											@foreach($tags as $tag)
											<option value="{{$tag->id}}" {{ collect(old('tags_id'))->contains($tag->id) ? 'selected' : ''}}
											>{{$tag->name}}</option>
											@endforeach
										</select>
									</div>

                                    <!-- Date and time range -->
                                    <div class="form-group">
                                        <label for="fecha">Fecha y hora del evento</label>                                       
                                        <input type="text" class="form-control" id="timepicker" name="fecha">
                                    </div>
                                    <!-- /.form group -->
							</div>
							<div class="col-md-4">
									<div class="form-group">
										<!-- <div class="dropzone">

										</div> -->
										<input type="file" id="file" name="file" value="{{ old('file') }}" />
										
									</div>
							</div>		
						</div>	
					</div>
						<div class="form-group">
							<button type="submit" class="btn mt-2 btn-primary btn-block" >Guardar Publicación</button>
						</div>
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

    <script src="{{asset('plugins/select2/dist/js/select2.min.j')}}s"></script>
    <script src="{{asset('plugins/datepicker/jquery-ui.js')}}"></script>
    <script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
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
        
        
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        });

        
        //Timepicker
        $('#timepicker').datetimepicker({
        format: 'LT'
        })

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