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
                        <li class="breadcrumb-item active" aria-current="page">Editar Rol</li>
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
                <div class="card-header"><h2>Editar Roles</h2></div>

                <div class="card-body">
                @include('custom.message')

                   
                    <form action="{{route('role.update', $role->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    
                        <div class="container">
                            <h3>Datos Requeridos</h3>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="{{old('name', $role->name)}}">
                            </div>  
                            <div class="form-group">
                                <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{old('slug', $role->slug)}}">
                            </div>  
                            <div class="form-group">
                                <textarea class="form-control" name="description" id="description" placeholder="Descripción" rows="3">{{old('description', $role->description)}}</textarea>
                            </div>

                            <hr>
                            <h3>Full Acceso</h3>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="fullaccessyes" name="full_access" class="custom-control-input" value="yes" 
                                @if($role['full_access']  == 'yes')
                                    checked
                                @elseif(old('full_access') == 'yes')
                                    checked
                                @endif
                                >
                                <label class="custom-control-label" for="fullaccessyes">Si</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="fullaccessno" name="full_access" class="custom-control-input" value="no" 
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
                                    <input type="checkbox" class="custom-control-input" id="permisssion_{{$permission->id}}" value="{{$permission->id}}" name="permission[]"
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

                            <input type="submit" class="btn btn-primary" value="Salvar">
                            <a class="btn btn-danger" href="{{route('role.index')}}">Regresar</a>

                        </div>
     
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')

@endpush