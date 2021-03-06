@extends('admin.layouts.app')

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
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
					
					<div class="col-lg-12">
						
							<h4>Usuarios</h4>
							@include('custom.message')
							<div class="card">
								<div class="card-body">
									<table class="table table-hover table-striped table-bordered " cellspacing="0" width="100%" id="users">
										<thead class="thead-dark">
											<tr>
											<th scope="col">#</th>
											<th>Nombre</th>
											<th>Email</th>
											<th>Role(s)</th>
											<th>Acciones</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($users as $user)
											
											<tr>
												<th scope="row">{{$user->id}}</th>
												<td>{{$user->name}}</td>
												<td>{{$user->email}}</td>
												<td>
												@isset($user->roles[0]->name)
                                    				{{$user->roles[0]->name}}
                                				@endisset
												</td>
												
												<td>

												@can('view', [$user, ['user.show', 'userown.show'] ]) 
													<!-- <a class="btn btn-sm btn-info" data-user_id="{{$user->id}}" data-user_name="{{$user->name}}" data-user_email="{{$user->email}}" data-user_roles="1" data-user_avatar="{{$user->avatar}}" data-toggle="modal" data-target="#AbrirModalUser" title="Ver"> 
														<i class="fa fa-eye"></i>
													</a> -->
													<a href="{{route('user.show', $user)}}" class="btn  btn-secondary btn-sm" title="Ver"> 
														<span class="flaticon-preview"></span>
													</a>
												@endcan
												
												@can('view', [$user, ['user.edit', 'userown.edit'] ]) 
													<!-- <a class="btn btn-sm btn-success" data-user_id="{{$user->id}}" data-user_name="{{$user->name}}" data-user_email="{{$user->email}}" data-user_roles="1" data-user_avatar="{{$user->avatar}}" data-toggle="modal" data-target="#ModificarUser" title="Modificar">
														<i class="fa fa-wpforms"></i>
													</a> -->
													<a href="{{route('user.edit', $user)}}" class="btn btn-sm btn-primary" title="Editar">
														<span class="flaticon-edit"></span>
													</a>
												@endcan
												
												@can('haveaccess','user.destroy') 
													<form action="{{route('user.destroy', $user->id)}}" method="POST" style="display: inline;">
														@csrf
														@method('DELETE')
														<button title="eliminar" class="btn btn-sm btn-danger" onclick="return alert('Esta seguro de querer eliminar este usuario?')">
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
					<!-- <div class="col-xl-4">
						<div class="recent_job_activity">
							<h4 class="title">Crear Etiquetas</h4>
							<div class="grid mb0">
								<div class="details">
								<form action="{{route('etiqueta.store')}}" method="POST">
								@csrf
										<div class="form-group">
											<input type="text" class="form-control" id="name" name="name" placeholder="Nombre">
										</div>
										<button type="submit" class="btn btn-log btn-block btn-thm2">Crear</button>
									</form>
								</div>
							</div>
						</div>
					</div> -->
				</div>
				<div class="row mt50">
					@include('admin.layouts.footer')
				</div>
			</div>
		</div>
	</div>
</section>

@include('user.resources.modal')

@endsection

@push('js')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

<script>
	$(function () {
        $('#users').DataTable({
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