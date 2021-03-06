@extends('admin.layouts.app')

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/bootstrap-switch/dist/css/bootstrap4/bootstrap-switch.min.css')}}">
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
					@include('admin.layouts.nav-admin', ['title' => 'Publicaciones', 'page' => 'publicación'] )
					</div>
					
					<div class="col-xl-12">
						<div class="application_statics">
						@can('haveaccess','blog.create')                        
							<a href="{{route('BlogCreate')}}" class="btn btn-primary pull-right" data-toggle="modal" data-target="#tituloBlog"><i class="fa fa-plus"></i>
							Crear Publicación</a>
						@endcan
							<h4>Publicaciones</h4>
							@include('custom.message')
							<div class="card">
								<div class="card-body">
									<table class="table table-hover table-striped table-bordered" cellspacing="0" width="100%" id="blogs">
										<thead class="thead-dark">
											<tr>
											<th scope="col">#</th>
											<th>Titulo</th>
											<th>Categoria</th>
											<th>Extracto</th>
											<th>Estado</th>
											<th>Fecha</th>
											<th>Acciones</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach($blogs as $blog)
                                            <tr>
                                                <td>{{$blog->id}}</td>
                                                <td>{{$blog->title}}</td>
                                                <td>{{$blog->category->name}}</td>
                                                <td>{{$blog->extracto}}</td>
                                                <td>
												@if($blog->status === "PUBLICADO")
													<button type="button" class="btn  btn-success btn-sm">
														<i class= "fa fa-check fa-2x"></i>
														Publicado
													</button>
												@else
													<button type="button" class="btn btn-warning btn-sm">
														<i class ="fa fa-wpforms fa-2x"></i>
														borrador
													</button>
													
												@endif
													<!-- <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch> -->
												</td>
												
                                                <td>{{$blog->created_at->format('Y/m/d')}}</td>
                                                <td>
                                                
													<a href="{{route('blog.show', $blog->slug)}}" class="btn btn-secondary btn-sm" title="Ver"> 
														<span class="flaticon-preview"></span>
													</a>
											
												
												
													<a href="{{route('BlogEdit', $blog)}}" style="color: #fff;" class="btn btn-primary btn-sm" title="Modificar">
														<span class="flaticon-edit"></span>
													</a>
												
												
												
													<form action="{{route('blog.destroy', $blog)}}" method="POST" style="display: inline;">
														@csrf
														@method('DELETE')
														<button title="eliminar" class="btn btn-danger btn-sm" onclick="return alert('Esta seguro de querer eliminar esta publicacion?')">
															<span class="flaticon-delete-button"></span>
														</button>
													</form>
												
                                                </td>
                                            </tr>

                                            @endforeach
										</tbody>
									</table>
									<div class="row text-center">
										<div class="col-lg-12">
											<div class="mbp_pagination mt20">
												<ul class="page_navigation">
													<!-- <li class="page-item disabled">
														<a class="page-link" href="#" tabindex="-1" aria-disabled="true"> <span class="flaticon-left-arrow"></span> Prev</a>
													</li> -->
												
													<!-- <li class="page-item">
														<a class="page-link" href="#">Next <span class="flaticon-right-arrow-1"></span></a>
													</li> -->
												</ul>
											</div> 
										</div>
									</div>
								</div>
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
@include('admin.blog.resources.modal')
@endsection


@push('js')  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="{{asset('plugins/bootstrap-switch/dist/js/bootstrap-switch.min.js')}}"></script>

<script>
	$(function () {
        $('#blogs').DataTable({
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

	$("[name='my-checkbox']").bootstrapSwitch();
	
</script>

@endpush