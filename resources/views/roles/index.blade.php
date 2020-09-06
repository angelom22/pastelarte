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
                            <nav class="breadcrumb_widgets" aria-label="breadcrumb mb30">
                                <h4 class="title float-left">Dashboard</h4>
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Roles</li>
                                </ol>
                            </nav>
                        </div>
                     
                        <!-- Contenio de la vista -->
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="card">
                                        <div class="card-header"><h2>Lista de Roles</h2></div>

                                        <div class="card-body">
                                        @can('haveaccess','role.create')                        
                                            <a href="{{route('role.create')}}" class="btn btn-primary float-right">Crear</a>
                                            <br>
                                            <br>
                                        @endcan
                                            @include('custom.message')

                                            <table class="table table-hover table-striped table-bordered">
                                                <thead class="thead-dark">
                                                    <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Slug</th>
                                                    <th scope="col">Descripción</th>
                                                    <th scope="col">full_access</th>
                                                    <th colspan="3" class="text-center">Acciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($roles as $role)
                                                    <tr>
                                                        <th scope="row">{{$role->id}}</th>
                                                        <td>{{$role->name}}</td>
                                                        <td>{{$role->slug}}</td>
                                                        <td>{{$role->description}}</td>
                                                        <td>{{$role['full_access']}}</td>
                                                        <td>
                                                        @can('haveaccess','role.show') 
                                                            <a class="btn btn-info" href="{{route('role.show', $role->id)}}">Ver</a>
                                                        @endcan
                                                        </td>
                                                        <td>
                                                        @can('haveaccess','role.edit')  
                                                            <a class="btn btn-success" href="{{route('role.edit', $role->id)}}">Editar</a>
                                                        @endcan
                                                        </td>
                                                        <td>
                                                        @can('haveaccess','role.destroy') 
                                                            <form action="{{route('role.destroy', $role->id)}}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger">
                                                                    Eliminar
                                                                </button>
                                                            </form>
                                                        @endcan
                                                        </td>
                                                    </tr>     
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            {{ $roles->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Fin del contenido -->
                    </div>
                    <div class="row mt50">
                        @include('admin.layouts.footer')
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
