@extends('layouts.app')

@push('css')

@endpush

@section('content')

<!-- Inner Page Breadcrumb -->
<section class="inner_page_breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 text-center">
                <div class="breadcrumb_content">
                    <h4 class="breadcrumb_title">Roles</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Roles</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

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

                    <table class="table table-responsive table-hover table-striped table-dark">
                        <thead>
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
@endsection

@push('js')

@endpush