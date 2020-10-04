@extends('admin.layouts.app')

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/icheck-bootstrap.min.css')}}">
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
                    @include('admin.layouts.nav-admin', ['title' => 'Carreras', 'page' => 'carrera'] )
					</div>

					<div class="col-xl-12">
						<div class="application_statics">
						@can('haveaccess','career.create')
							<a href="{{route('careerCreate')}}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>
							Crear Carrera</a>
						@endcan
							<h4>Listado de Carreras</h4>
							@include('custom.message')
							<div class="card">
								<div class="card-body">
									<table class="table table-hover table-striped table-bordered" cellspacing="0" width="100%" id="career">
										<thead class="thead-dark">
											<tr>
											<th scope="col">#</th>
											<th>Titulo</th>
											<th>Slug</th>
											<th>precio</th>
                                            <th>Video Preview</th>
											<th>Acciones</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach($carreras as $carrera)
                                            <tr>
                                                <td>{{$carrera->id}}</td>
                                                <td>{{$carrera->title}}</td>
                                                <td>{{$carrera->slug}}</td>
                                                <td>{{$carrera->precio}}</td>
                                                <td>{{$carrera->url_video_preview_carrera}}</td>
                                                <td>
                                                @can('haveaccess','career.show')
													<a href="{{route('carrera.show', $carrera->slug)}}" class="btn btn-secondary btn-sm" title="Ver">
														<span class="flaticon-preview"></span>
													</a>
                                                @endcan
												@can('haveaccess','career.edit')
                                                    <a href="#"
                                                    style="color: #fff;"
                                                    class="btn btn-primary btn-sm"
                                                    title="Modificar"
                                                    data-carrera_id="{{$carrera->id}}"
                                                    data-carrera_titulo = "{{$carrera->title}}"
		                                            data-carrera_precio = "{{$carrera->precio}}"
		                                            data-carrera_url_video = "{{$carrera->url_video_preview_carrera}}"
                                                    data-toggle="modal"
                                                    data-target="#EditarCarrera"
                                                    >
														<span class="flaticon-edit"></span>
													</a>
                                                @endcan
												@can('haveaccess','career.destroy')
													<form action="{{route('carrera.destroy', $carrera)}}" method="POST" style="display: inline;">
														@csrf
														@method('DELETE')
														<button title="eliminar" class="btn btn-danger btn-sm" onclick="return alert('Esta seguro de querer eliminar esta carrera?')">
															<span class="flaticon-delete-button"></span>
														</button>
													</form>
                                                @endcan
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
@include('admin.carreras.resources.modal')
@endsection


@push('js')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

<script>
	$(function () {
        $('#career').DataTable({
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

<script>
    // Modal para crear lección
	$('#EditarCarrera').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);
        var carrera_id = button.data('carrera_id');
		var carrera_titulo = button.data('carrera_titulo');
		var carrera_precio = button.data('carrera_precio');
		// var carrera_descipcion = button.data('carrera_descipcion');
		var carrera_url_video = button.data('carrera_url_video');
        console.log(carrera_id);


		var modal = $(this);

        modal.find('.modal-body #carrera_id').val(carrera_id);
        modal.find('.modal-body #title').val(carrera_titulo);
        modal.find('.modal-body #precio').val(carrera_precio);
        // modal.find('.modal-body #description').val(carrera_descipcion);
        modal.find('.modal-body #url_video_preview_carrera').val(carrera_url_video);
	});
</script>

@endpush