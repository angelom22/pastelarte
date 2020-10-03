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
						@include('admin.layouts.nav-admin', ['title' => 'Mis Cursos', 'page' => 'Mis Cursos'] )
						</div>


						<div class="col-lg-12">
							<div class="my_course_content_container">

								<div class="my_course_content mb30">
									<div class="my_course_content_header">
										<div class="col-xl-4">
											<div class="instructor_search_result style2">
												<h4 class="mt10">Lista de mis cursos</h4>
											</div>
										</div>
										<div class="col-xl-8">
											<div class="candidate_revew_select style2 text-right">
												<ul class="mb0">
													<li class="list-inline-item">
														<select class="selectpicker show-tick">
															<option>Cursos Gratuitos</option>
															<option>Cursos Pagos</option>
															<option>Carrera de pastelería</option>
															<option>Carrera de decoración de tortas</option>
														</select>
													</li>
													<li class="list-inline-item">
														<div class="candidate_revew_search_box course fn-520">
															<form class="form-inline my-2 my-lg-0">
														    	<input class="form-control mr-sm-2" type="search" placeholder="" aria-label="Search">
														    	<button class="btn my-2 my-sm-0" type="submit"><span class="flaticon-magnifying-glass"></span></button>
														    </form>
														</div>
													</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="my_course_content_list">
										<div class="mc_content_list style2">
											<div class="thumb">
												<img class="img-whp" src="{{asset('img/courses/t1.jpg')}}" alt="t1.jpg">
												<div class="overlay">
													<ul class="mb0">
														<li class="list-inline-item">
															<a class="mcc_view" href="">Ver</a>
														</li>
													</ul>
												</div>
											</div>
											<div class="details">
												<div class="mc_content">
													<p class="subtitle">Chef Beatriz Román</p>
													<h5 class="title">Curso de Técnicas de Pastelería <span><small class="tag">Disponible</small></span></h5>
													<p>Lorem ipsum dolor sit amet, est ei idque voluptua copiosae, pro detracto disputando reformidans at, ex vel suas eripuit. Vel alii zril maiorum ex, mea id sale eirmod epicurei. Sit te possit senserit, eam alia veritus maluisset ei, id cibo vocent ocurreret per. Te qui doming doctus referrentur, usu debet tamquam et.</p>
												</div>
												<div class="mc_footer style2">
													<ul class="mc_meta fn-414">
														<li class="list-inline-item"><a href="#"><i class="flaticon-profile"></i></a></li>
														<li class="list-inline-item"><a href="#">1548</a></li>
														<li class="list-inline-item"><a href="#"><i class="flaticon-comment"></i></a></li>
														<li class="list-inline-item"><a href="#">25</a></li>
													</ul>
													<ul class="mc_review fn-414">
														<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
														<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
														<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
														<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
														<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
														<li class="list-inline-item"><a href="#">(5)</a></li>
														<li class="list-inline-item tc_price fn-414"><a href="#">$69.95</a></li>
													</ul>
												</div>
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