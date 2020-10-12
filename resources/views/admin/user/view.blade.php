@extends('admin.layouts.app')

@push('css')
    
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
                        @include('admin.layouts.nav-admin', ['title' => 'Perfil', 'page' => 'usuario'] )
						</div>
						<div class="col-lg-12">
							<div class="my_course_content_container">
								<div class="my_setting_content mb30">
									<div class="my_setting_content_header">
										<div class="my_sch_title">
											<h4 class="m0">Información Personal</h4>
										</div>
                                    </div>
                                    @include('custom.message')
                                
                                    <form action="{{route('user.update', $user)}}" method="POST" enctype="multipart/form-data" id="UserUpdate">
                                    @csrf
									@method('PUT')
									
									<input type="hidden" name="user_id" value="{{$user}}">
                                    
                                    <div class="row my_setting_content_details pb0">
                                        <div class="col-xl-6">
											<div class="">
                                                <img style="object-fit: cover; object-position: center center;" class="float-left" src="/storage/{{$user->avatar}}" alt="{{$user->name}}">
            
											    <input type="file" name="avatar" id="avatar" accept=".jpg, .png" value="{{old('avatar')}}"/>
											    <!-- <label  for="avatar">
											      	<span>Bucar</span>
											    </label> -->
											</div>
                                        </div>
										<!-- <div class="col-xl-2">
                                            <div class="my_profile_setting_input2">
                                                <form action="/file-upload" class="dropzone">
                                                    <div class="fallback">
                                                        <input name="avatar" type="file" />
                                                    </div>
                                                </form>
                                            </div>
                                        </div> -->
										<div class="col-xl-6">
											<div class="row">
												<div class="col-xl-6">
													<div class="my_profile_setting_input form-group">
												    	<label for="name">Nombre</label>
												    	<input type="text" class="form-control" id="name" name="name" value="{{old('name',$user->name)}}">
													</div>
													<div class="my_profile_setting_input form-group">
												    	<label for="email">Correo</label>
                                                        <input type="email" class="form-control" id="email" name="email" value="{{old('email', $user->email)}}">
                                                        <p style="font-size:10px;">No puedes modificar el correo con el cual te supcribiste</p>
													</div>
												</div>
												<div class="col-xl-6">
                                                    
                                                    <div class="form-group" style="display:none;">
                                                        <label for="roles">Rol</label>
                                                        <select class="form-control" name="roles" id="roles">
                                                            @foreach($roles as $role)
                                                                <option value="{{$role->id}}"
                                                                @isset($id->roles[0]->name)
                                                                    @if($role->name == $id->roles[0]->name)
                                                                        selected
                                                                    @endif
                                                                @endisset
                                                                
                                                                >{{$role->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    
                                                    <!-- <div class="my_profile_setting_input form-group">
												    	<label for="phone">Celular</label>
												    	<input type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneNumber">
													</div> -->
													
												</div>
											</div>
                                        </div>
										
									</div>
									<div class="my_setting_content_header style2">
										<div class="my_sch_title">
											<h4 class="m0">Cambio de Contraseña</h4>
										</div>
									</div>
									<div class="row my_setting_content_details pb0">
										<div class="col-xl-6">
											<div class="password_change_form">
												
													<!-- <div class="form-group">
												    	<label for="old_password">Antigua Contraseña</label>
												    	<input type="password" class="form-control" id="old_password" name="old_password" placeholder="*******">
													</div> -->
													<div class="form-group">
												    	<label for="password">Nueva Contraseña</label>
                                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                                        <span class="help-block">Dejar vacio si no quieres cambiar tu contraseña</span>
													</div>
													<div class="form-group">
												    	<label for="password_confirmation">Confirmar Contraseña</label>
												    	<input id="password_confirmation" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
													</div>
												
											</div>
										</div>
									</div>
									
									<div class="row my_setting_content_details">
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

<script>
	
	$.validator.setDefaults({
		submitHandler: function () {
			var datos = $("#UserUpdate").serialize();
			var token = $('meta[name="csrf-token"]').attr('content');
			$.ajax({
			type: "PUT",
			url: "user.update",
			dataType: "json",
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			headers: {
				'X-CSRF-TOKEN': token
			},
			data: datos,
			success: function(respuesta) {
				console.log(respuesta);
				
				setTimeout(function(){
						window.location = '/';
					},2000);
			},
			error: function(respuesta) {
				if (respuesta.status == 422) {
				
				}
			}
		});
		
		}
	});
	
	$('#UserUpdate').validate({
	rules: {
	name:{
		required: true,
		minlength: 5
	},
	email: {
		required: true,
		email:true
	},
	avatar: {
		accept: "image/*",
		// extension: "png,jpg,jpeg,gif"
	},
	old_password: {
		minlength: 8
	},
	password: {
		minlength: 8
	},
	password_confirmation: {
        minlength: 8,
        equalTo: "#password"
      },
	},
	messages: {
	name:{
		required: "El nombre es un campo obligatorio",
		minlength: "La longitud minima del campo son 5 caracteres"
	},
	email: {
		required: "El correo es un campo obligatorio",
		email: "El campo correo de contener '@'"
	},
	avatar: {
		extension: "extencion no valida"
	},
	password: {
		minlength: "La longitud minima de la contraseña deben ser 8 caracteres"
	},
	password_confirmation: {
        minlength: "La longitud minima de la contraseña deben ser 8 caracteres",
        equalTo: "El password no coincide"
      },
	},
	errorElement: 'span',
	errorPlacement: function (error, element) {
	error.addClass('invalid-feedback');
	element.closest('.form-group').append(error);
	},
	highlight: function (element, errorClass, validClass) {
	$(element).addClass('is-invalid');
	},
	unhighlight: function (element, errorClass, validClass) {
	$(element).removeClass('is-invalid');
	}
	});
</script>

@endpush