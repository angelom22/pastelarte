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
                            @include('admin.layouts.nav-admin', ['title' => 'Cursos', 'page' => 'curso'] )
						</div>
						<div class="col-lg-12">
							<div class="my_course_content_container">
								<div class="my_course_content mb30">
									<div class="my_course_content_header">
										<div class="col-xl-4">
											<div class="instructor_search_result style2">
                                                <h4 class="mt10">Mis Cursos</h4>
                                                @can('haveaccess','course.create')                        
                                                    <a href="{{route('CourseCreate')}}" class="btn btn-primary pull-left">  
                                                        <i class="fa fa-plus"></i>
                                                    Añadir Curso</a>
                                                @endcan
                                            </div>
                                           
										</div>
										<div class="col-xl-8">
											<div class="candidate_revew_select style2 text-right">
												<ul class="mb0">
													<li class="list-inline-item">
														<select class="selectpicker show-tick">
															<option>Pastelería</option>
															<option>Decoración de Tortas</option>
														</select>
													</li>
													<!-- <li class="list-inline-item">
														<select class="selectpicker show-tick">
															<option>Recientemente publicado</option>
															<option>Recientes</option>
															<option>Anteriores</option>
														</select>
													</li> -->
													<li class="list-inline-item">
														<div class="candidate_revew_search_box course fn-520">
															<form class="form-inline my-2 my-lg-0">
														    	<input class="form-control mr-sm-2" type="search" placeholder="Buscar curso" aria-label="Search">
														    	<button class="btn my-2 my-sm-0" type="submit"><span class="flaticon-magnifying-glass"></span></button>
														    </form>
														</div>
                                                    </li>
                                            
												</ul>
											</div>
										</div>
									</div>
									<div class="my_course_content_list">
										<div class="mc_content_list">
											<div class="thumb">
												<img class="img-whp" src="{{asset('img/courses/t1.jpg')}}" alt="t1.jpg">
												<div class="overlay">
													<ul class="mb0">
														<li class="list-inline-item">
															<a class="mcc_edit" href="#">Edit</a>
														</li>
														<li class="list-inline-item">
															<a class="mcc_view" href="#">View</a>
														</li>
													</ul>
												</div>
											</div>
											<div class="details">
												<div class="mc_content">
													<p class="subtitle">Ali TUFAN</p>
													<h5 class="title">Introduction Web Design with HTML <span><small class="tag">Published</small></span></h5>
													<p>Lorem ipsum dolor sit amet, est ei idque voluptua copiosae, pro detracto disputando reformidans at, ex vel suas eripuit. Vel alii zril maiorum ex, mea id sale eirmod epicurei. Sit te possit senserit, eam alia veritus maluisset ei, id cibo vocent ocurreret per. Te qui doming doctus referrentur, usu debet tamquam et.</p>
												</div>
												<div class="mc_footer">
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
										<div class="mc_content_list">
											<div class="thumb">
												<img class="img-whp" src="{{asset('img/courses/t2.jpg')}}" alt="t2.jpg">
												<div class="overlay">
													<ul class="mb0">
														<li class="list-inline-item">
															<a class="mcc_edit" href="#">Edit</a>
														</li>
														<li class="list-inline-item">
															<a class="mcc_view" href="#">View</a>
														</li>
													</ul>
												</div>
											</div>
											<div class="details">
												<div class="mc_content">
													<p class="subtitle">Ali TUFAN</p>
													<h5 class="title">Designing a Responsive Mobile Website with Muse</h5>
													<p>Lorem ipsum dolor sit amet, est ei idque voluptua copiosae, pro detracto disputando reformidans at, ex vel suas eripuit. Vel alii zril maiorum ex, mea id sale eirmod epicurei. Sit te possit senserit, eam alia veritus maluisset ei, id cibo vocent ocurreret per. Te qui doming doctus referrentur, usu debet tamquam et.</p>
												</div>
												<div class="mc_footer">
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
										<div class="mc_content_list">
											<div class="thumb">
												<img class="img-whp" src="{{asset('img/courses/t3.jpg')}}" alt="t3.jpg">
												<div class="overlay">
													<ul class="mb0">
														<li class="list-inline-item">
															<a class="mcc_edit" href="#">Edit</a>
														</li>
														<li class="list-inline-item">
															<a class="mcc_view" href="#">View</a>
														</li>
													</ul>
												</div>
											</div>
											<div class="details">
												<div class="mc_content">
													<p class="subtitle">Ali TUFAN</p>
													<h5 class="title">Sketch: Creating Responsive SVG <span class="style2"><small class="tag">Cancelled</small></span></h5>
													<p>Lorem ipsum dolor sit amet, est ei idque voluptua copiosae, pro detracto disputando reformidans at, ex vel suas eripuit. Vel alii zril maiorum ex, mea id sale eirmod epicurei. Sit te possit senserit, eam alia veritus maluisset ei, id cibo vocent ocurreret per. Te qui doming doctus referrentur, usu debet tamquam et.</p>
												</div>
												<div class="mc_footer">
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
										<div class="mc_content_list">
											<div class="thumb">
												<img class="img-whp" src="{{asset('img/courses/t4.jpg')}}" alt="t4.jpg">
												<div class="overlay">
													<ul class="mb0">
														<li class="list-inline-item">
															<a class="mcc_edit" href="#">Edit</a>
														</li>
														<li class="list-inline-item">
															<a class="mcc_view" href="#">View</a>
														</li>
													</ul>
												</div>
											</div>
											<div class="details">
												<div class="mc_content">
													<p class="subtitle">Ali TUFAN</p>
													<h5 class="title">How to be a DJ? Make Electronic Music</h5>
													<p>Lorem ipsum dolor sit amet, est ei idque voluptua copiosae, pro detracto disputando reformidans at, ex vel suas eripuit. Vel alii zril maiorum ex, mea id sale eirmod epicurei. Sit te possit senserit, eam alia veritus maluisset ei, id cibo vocent ocurreret per. Te qui doming doctus referrentur, usu debet tamquam et.</p>
												</div>
												<div class="mc_footer">
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
					<div class="row mt10">
                    @include('admin.layouts.footer')
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection