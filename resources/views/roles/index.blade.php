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
                     
                        <!-- Contenio de la vista -->
                        <div class="col-xl-12">
                            <div class="application_statics">
                            @can('haveaccess','role.create')                        
                                <a href="{{route('role.create')}}" class="btn btn-primary pull-right">  
                                    <i class="fa fa-plus"></i>
							    Crear Rol</a>
                            @endcan
                                <h4>Roles</h4>        
                                @include('custom.message')
                                <div class="card">
                                    <div class="card-body">
                                        <table class="table table-hover table-striped table-bordered" cellspacing="0" width="100%" id="roles">
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nombre</th>
                                                    <th>Slug</th>
                                                    <th>Descripción</th>
                                                    <th>full_access</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($roles as $role)
                                                <tr>
                                                    <th>{{$role->id}}</th>
                                                    <td>{{$role->name}}</td>
                                                    <td>{{$role->slug}}</td>
                                                    <td>{{$role->description}}</td>
                                                    <td>{{$role['full_access']}}</td>
                                                    <td>
                                                    @can('haveaccess','role.show')   
                                                        <a href="{{route('role.show', $role)}}" class="btn btn-sm btn-secondary" title="Ver"> 
                                                            <span class="flaticon-preview"></span>
                                                        </a>
                                                    @endcan
                        
                                                    @can('haveaccess','role.edit')  
                                                        <a href="{{route('role.edit', $role)}}" class="btn btn-sm btn-info" title="Modificar">
                                                            <span class="flaticon-edit"></span>
                                                        </a>
                                                    @endcan
                                                    
                                                    @can('haveaccess','role.destroy') 
                                                        <form action="{{route('role.destroy', $role)}}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button title="eliminar" class="btn btn-sm btn-danger" onclick="return alert('Esta seguro de querer eliminar este rol?')">
                                                                <span class="flaticon-delete-button"></span>
                                                            </button>
                                                        </form>
                                                    @endcan
                                                    </td>
                                                </tr>     
                                                @endforeach
                                            </tbody>
                                        </table>
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

@push('js')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

<script>
	$(function () {
        $('#roles').DataTable({
            responsive: true,
            language: {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            },
			"lengthMenu": [[5, 15, 50, -1], [5, 15, 50, "All"]]
        });
    });
</script>

@endpush
