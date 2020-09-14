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
					@include('admin.layouts.nav-admin', ['title' => 'Usuarios', 'page' => 'usuario'] )
					</div>
					
					<div class="col-xl-8">
						<div class="application_statics">
							<h4>Ver Usuario</h4>
							@include('custom.message')
							<div class="card">

                                <div class="card-body">
                                @include('custom.message')

                                    <form action="{{route('user.update', $user->id)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    
                                        <div class="form-group">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="{{old('name', $user->name)}}" disabled>
                                            </div>  
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="email" name="email" placeholder="Correo" value="{{old('email', $user->email)}}" disabled>
                                            </div>  
                                            
                                            <div class="form-group">
                                                <select disabled class="form-control" name="roles" id="roles">
                                                    @foreach($roles as $role)
                                                        <option value="{{$role->id}}"
                                                        @isset($user->roles[0]->name)
                                                            @if($role->name == $user->roles[0]->name)
                                                                selected
                                                            @endif
                                                        @endisset
                                                        
                                                        >{{$role->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div> 

                                            <hr>
                                            
                                            <a class="btn btn-success" href="{{route('user.edit', $user->id)}}">Editar</a>
                                            <a class="btn btn-danger" href="{{route('user.index')}}">Regresar</a>
                                        </div>
                    
                                    </form>

                                </div>
                            </div>
						</div>
					</div>
					<div class="col-xl-4">
						<div class="recent_job_activity">
							<h4 class="title">Avatar</h4>
							<div class="grid mb0">
								<div class="details">
									<div class="col-xl-2">
										<div class="wrap-custom-file">
											<img style="object-fit: cover; object-position: center center;" class="float-left" src="{{asset('storage/'.$user->avatar)}}" alt="avatar">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row mt50">
					@include('admin.layouts.footer')
				</div>
			</div>
		</div>
	</div>
</section>

@endsection


@push('js')

@endpush


