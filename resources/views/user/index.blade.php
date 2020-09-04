@extends('admin.layouts.app')

@push('css')
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
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
				<div class="user_board">
					<div class="user_profile">
						<div class="media">
							<div class="media-body">
								<h4 class="mt-0">Start</h4>
							</div>
						</div>
					</div>
					<div class="dashbord_nav_list">
						<ul>
							<li class="active"><a href="page-dashboard.html"><span class="flaticon-puzzle-1"></span> Dashboard</a></li>
							<li><a href="page-my-courses.html"><span class="flaticon-online-learning"></span> My Courses</a></li>
							<li><a href="page-my-order.html"><span class="flaticon-shopping-bag-1"></span> Order</a></li>
							<li><a href="page-my-message.html"><span class="flaticon-speech-bubble"></span> Messages</a></li>
							<li><a href="page-my-review.html"><span class="flaticon-rating"></span> Reviews</a></li>
							<li><a href="page-my-bookmarks.html"><span class="flaticon-like"></span> Bookmarks</a></li>
							<li><a href="page-my-listing.html"><span class="flaticon-add-contact"></span> Add listing</a></li>
							@if(auth()->user()->roles[0]->full_access == 'yes')
							<li><a href="{{route('blog.create')}}"><span class="flaticon-blog"></span> Añadir Blog</a></li>
							@endif
						</ul>
						<h4>Account</h4>
						<ul>
							<li><a href="page-my-setting.html"><span class="flaticon-settings"></span> Settings</a></li>
							<li><a href="page-login.html"><span class="flaticon-logout"></span> Logout</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-lg-8 col-xl-10">
				<div class="row">
					<div class="col-lg-12">
						<div class="dashboard_navigationbar dn db-991">
							<div class="dropdown">
								<button onclick="myFunction()" class="dropbtn"><i class="fa fa-bars pr10"></i> Dashboard Navigation</button>
								<ul id="myDropdown" class="dropdown-content">
									<li class="active"><a href="page-dashboard.html"><span class="flaticon-puzzle-1"></span> Dashboard</a></li>
									<li><a href="page-my-courses.html"><span class="flaticon-online-learning"></span> My Courses</a></li>
									<li><a href="page-my-order.html"><span class="flaticon-shopping-bag-1"></span> Order</a></li>
									<li><a href="page-my-message.html"><span class="flaticon-speech-bubble"></span> Messages</a></li>
									<li><a href="page-my-review.html"><span class="flaticon-rating"></span> Reviews</a></li>
									<li><a href="page-my-bookmarks.html"><span class="flaticon-like"></span> Bookmarks</a></li>
									<li><a href="page-my-listing.html"><span class="flaticon-add-contact"></span> Add listing</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-lg-12">
						<nav class="breadcrumb_widgets" aria-label="breadcrumb mb30">
							<h4 class="title float-left">Dashboard</h4>
							<ol class="breadcrumb float-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active" aria-current="page">Usuarios</li>
							</ol>
						</nav>
					</div>
					
					<div class="col-xl-12">
						<div class="application_statics">
							<h4>Usuarios</h4>
							@include('custom.message')
							<div class="card">
								<div class="card-body">
									<table class="table table-hover table-striped table-bordered" cellspacing="0" width="100%" id="users">
										<thead class="thead-dark">
											<tr>
											<th scope="col">#</th>
											<th>Nombre</th>
											<th>Email</th>
											<th>Role(s)</th>
											<th colspan="3" class="text-center">Acciones</th>
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
													<a class="btn btn-xs btn-info" data-user_id="{{$user->id}}" data-user_name="{{$user->name}}" data-user_email="{{$user->email}}" data-user_roles="1" data-user_avatar="{{$user->avatar}}" data-toggle="modal" data-target="#AbrirModalUser" title="Ver"> 
														<i class="fa fa-eye"></i>
													</a>
												@endcan
												
												@can('view', [$user, ['user.edit', 'userown.edit'] ]) 
													<a class="btn btn-xs btn-success" data-user_id="{{$user->id}}" data-user_name="{{$user->name}}" data-user_email="{{$user->email}}" data-user_roles="1" data-user_avatar="{{$user->avatar}}" data-toggle="modal" data-target="#ModificarUser" title="Modificar">
														<i class="fa fa-wpforms"></i>
													</a>
												@endcan
												
												@can('haveaccess','user.destroy') 
													<form action="{{route('user.destroy', $user->id)}}" method="POST">
														@csrf
														@method('DELETE')
														<button title="eliminar" class="btn btn-xs btn-danger">
															<i class="fa fa-close"></i>
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
													{{ $users->links() }}
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
					<div class="col-lg-6 offset-lg-3">
						<div class="copyright-widget text-center">
							<p class="color-black2">Copyright PastelArte © 2020. Todos los Derechos Resevados.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@include('user.resources.modal')

@endsection


@push('js')
<!-- 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script> -->

<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

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
        });
    });
</script>

@endpush