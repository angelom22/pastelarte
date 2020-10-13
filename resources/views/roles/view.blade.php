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
                        @include('admin.layouts.nav-admin', ['title' => 'Roles', 'page' => 'rol'] )
                        </div>
                        
                        <!-- Contenido de la Vista -->
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header"><h2>Editar Roles</h2></div>

                                        <div class="card-body">
                                        @include('custom.message')

                                        
                                            <form action="{{route('role.update', $role)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            
                                                <div class="container">
                                                    <h3>Datos Requeridos</h3>
                                                </div>

                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="{{old('name', $role->name)}}" readonly>
                                                    </div>  
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{old('slug', $role->slug)}}" readonly>
                                                    </div>  
                                                    <div class="form-group">
                                                        <textarea readonly class="form-control" name="description" id="description" placeholder="Descripción" rows="3">{{old('description', $role->description)}}</textarea>
                                                    </div>

                                                    <hr>
                                                    <h3>Full Acceso</h3>
                                                    <div class="custom-control custom-radio">
                                                        <input disabled type="radio" id="fullaccessyes" name="full_access" class="custom-control-input" value="yes" 
                                                        @if($role['full_access']  == 'yes')
                                                            checked
                                                        @elseif(old('full_access') == 'yes')
                                                            checked
                                                        @endif
                                                        >
                                                        <label class="custom-control-label" for="fullaccessyes">Si</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input disabled type="radio" id="fullaccessno" name="full_access" class="custom-control-input" value="no" 
                                                        @if($role['full_access']  == 'no')
                                                            checked
                                                        @elseif(old('full_access') == 'no')
                                                            checked
                                                        @endif
                                                        >
                                                        <label class="custom-control-label" for="fullaccessno">No</label>
                                                    </div>
                                                    <hr>

                                                    <h3>Lista de Permisos</h3>
                                                    @foreach($permissions as $permission)
                                                        <div class="custom-control custom-checkbox">
                                                            <input disabled type="checkbox" class="custom-control-input" id="permisssion_{{$permission->id}}" value="{{$permission->id}}" name="permission[]"
                                                            @if( is_array(old('permission')) && in_array($permission->id, old('permission')))
                                                                checked

                                                            @elseif( is_array($permission_role) && in_array($permission->id, $permission_role))
                                                                checked

                                                            @endif
                                                            >
                                                            <label class="custom-control-label" for="permisssion_{{$permission->id}}">
                                                                {{$permission->id}}
                                                                -
                                                                {{$permission->name}}
                                                                <em>( {{$permission->description}} )</em>
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                    <hr>

                                                    <a class="btn btn-success" href="{{route('role.edit', $role->id)}}">Editar</a>
                                                    <a class="btn btn-danger" href="{{route('role.index')}}">Regresar</a>
                                                </div>
                            
                                            </form>


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
