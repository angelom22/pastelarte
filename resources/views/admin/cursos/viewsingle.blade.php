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
						@include('admin.layouts.nav-admin', ['title' => 'Técnicas de pastelería', 'page' => 'Técnicas de pastelería'] )
						</div>


						<div class="col-xl-9">
							<div class="application_statics">
								<h4>Lección 1.1 Herramientas e Insumos</h4>
								<div class="c_container">

							<div class="courses_single_container">
								<div class="cs_row_one">
									<div class="cs_ins_container">
										<div class="courses_big_thumb">
											<div class="thumb">
												<iframe class="iframe_video" src="//www.youtube.com/embed/57LQI8DKwec" frameborder="0" allowfullscreen></iframe>
											</div>
										</div>
									</div>
								</div>
								<div class="cs_rwo_tabs csv2">
									<ul class="nav nav-tabs" id="myTab" role="tablist">
										<li class="nav-item">
										    <a class="nav-link active" id="Overview-tab" data-toggle="tab" href="#Overview" role="tab" aria-controls="Overview" aria-selected="true">Contenido</a>
										</li>
										<li class="nav-item">
										    <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Comentarios</a>
										</li>
									</ul>
									<div class="tab-content" id="myTabContent">
										<div class="tab-pane fade show active" id="Overview" role="tabpanel" aria-labelledby="Overview-tab">
											<div class="cs_row_two csv2">
												<div class="cs_overview">
													<h4 class="title">Herramientas e Insumos</h4>
													<h4 class="subtitle">Descripción de la lección</h4>
													<p class="mb30">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. </p>
												</div>
											</div>
										</div>

										<div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">

											<div class="cs_row_six csv2">
												<div class="sfeedbacks">
													<div class="mbp_pagination_comments">
														<div class="mbp_first media csv1">
															<img src="images/resource/review1.png" class="mr-3" alt="review1.png">
															<div class="media-body">
														    	<h4 class="sub_title mt-0">Warren Bethell</h4>
														    	<p class="fz15 mt20">This is the second Photoshop course I have completed with Cristian. Worth every penny and recommend it highly. To get the most out of this course, its best to to take the Beginner to Advanced course first.</p>
																<div class="custom_hr style2"></div>
															</div>
														</div>
														<div class="custom_hr"></div>
													</div>
												</div>
											</div>


											<div class="cs_row_seven csv2">
												<div class="sfeedbacks">
													<div class="mbp_comment_form style2 pb0">
														<h4>Agregar comentarios</h4>
														<form class="comments_form">
															<div class="form-group">
														    	<label for="exampleInputName1">Titulo</label>
														    	<input type="text" class="form-control" id="exampleInputName1" aria-describedby="textHelp">
															</div>
															<div class="form-group">
															    <label for="exampleFormControlTextarea1">Comentario</label>
															    <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
															</div>
															<button type="submit" class="btn btn-thm">Comentar <span class="flaticon-right-arrow-1"></span></button>
														</form>
													</div>
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>













						<div class="col-xl-3">
							<div class="recent_job_activity">
								<h4 class="title">Lecciones</h4>
								<div class="grid">

							<div class="media">
								<a href=""><iframe class="iframe_video" src="//www.youtube.com/embed/57LQI8DKwec" frameborder="0" allowfullscreen></iframe></a>
							</div><br>

							<div class="media">
								<iframe class="iframe_video" src="//www.youtube.com/embed/57LQI8DKwec" frameborder="0" allowfullscreen></iframe>
							</div><br>

							<div class="media">
								<iframe class="iframe_video" src="//www.youtube.com/embed/57LQI8DKwec" frameborder="0" allowfullscreen></iframe>
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