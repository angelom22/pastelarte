@extends('layouts.app')

@section('meta_title', $curso->title)
@section('meta_description', $curso->extracto)

@section('content')

	<!-- Inner Page Breadcrumb -->
	<section class="inner_page_breadcrumb csv2">
		<div class="container">
			<div class="row">
				<div class="col-xl-9">
					<div class="breadcrumb_content">
						<div class="cs_row_one csv2">
							<div class="cs_ins_container">
								<div class="cs_instructor">
									<ul class="cs_instrct_list float-left mb0">
										<li class="list-inline-item"><p class="color-white">{{$curso->instructor}}</p></li>
										<li class="list-inline-item"><p class="color-white">última actualización {{$curso->updated_at->format('d/m/Y')}}</p></li>
									</ul>
								</div>
								<h3 class="cs_title color-white">{{$curso->title}}</h3>
								<ul class="cs_review_enroll">
									<li class="list-inline-item color-white"><span class="flaticon-profile"></span>{{$curso->estudiantes_count}}estudiantes inscritos</li>
									<li class="list-inline-item color-white"><span class="flaticon-comment"></span> 0 comentarios</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Our Team Members -->
	<section class="course-single2 pb40">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-8 col-xl-9">
					<div class="row">
						<div class="col-lg-12">
							<div class="courses_single_container">
								<div class="cs_row_one">
									<div class="cs_ins_container">
										<div class="courses_big_thumb">
											<div class="thumb">
												<iframe class="iframe_video" src="{{$curso->url_video_preview_curso}}"  height="400" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
											</div>
										</div>
									</div>
								</div>
								<div class="cs_rwo_tabs csv2">
									<ul class="nav nav-tabs" id="myTab" role="tablist">
										<li class="nav-item">
										    <a class="nav-link active" id="Overview-tab" data-toggle="tab" href="#Overview" role="tab" aria-controls="Overview" aria-selected="true">Descripción</a>
										</li>
										<li class="nav-item">
										    <a class="nav-link" id="course-tab" data-toggle="tab" href="#course" role="tab" aria-controls="course" aria-selected="false">Contenido</a>
										</li>
										<li class="nav-item">
										    <a class="nav-link" id="instructor-tab" data-toggle="tab" href="#instructor" role="tab" aria-controls="instructor" aria-selected="false">Instructor</a>
										</li>
										<li class="nav-item">
										    <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Comentarios</a>
										</li>
									</ul>

								<div class="tab-content" id="myTabContent">
										<div class="tab-pane fade show active" id="Overview" role="tabpanel" aria-labelledby="Overview-tab">
											<div class="cs_row_two csv2">
												<div class="cs_overview">
													<h4 class="title">{!! $curso->description !!}</h4>
												</div>
											</div>
										</div>


										<div class="tab-pane fade" id="course" role="tabpanel" aria-labelledby="review-tab">
											<div class="cs_row_three csv2">
												<div class="course_content">
													<div class="cc_headers">
														<h4 class="title">Contenido del curso</h4>
														<ul class="course_schdule float-right">
															<li class="list-inline-item"><a href="#">{{$curso->lecciones->count()}} Lecciones</a></li>
															<li class="list-inline-item"><a href="#">{{$curso->totalTime()}}</a></li>
														</ul>
													</div>
                                                    <br>
                                                    @forelse($curso->lecciones as $leccion)
													<div class="details">
													  	<div id="accordion" class="panel-group cc_tab">
														    <div class="panel">
														      	<!-- <div class="panel-heading">
															      	<h4 class="panel-title">
															        	<a href="#{{$leccion->slug}}" class="accordion-toggle link" data-toggle="collapse" data-parent="#accordion">{{$leccion->title_leccion}}</a>
															        </h4>
														      	</div> -->
															    <div id="{{$leccion->slug}}" class="panel-collapse collapse show">
															        <div class="panel-body">
															        	<ul class="cs_list mb0">
															        		<li>
																				<span class="flaticon-play-button-1 icon"></span> {{$leccion->title_leccion}}
																				<span class="cs_time badge badge-dark float-right mr-1 mt-2">
																						{{ __(":duracion min", ["duracion" => $leccion->duracion_leccion]) }}
																				</span>
																			</li>	
															        	</ul>
															        </div>
															    </div>
														    </div>
														</div>
													</div>
													@empty
													<div class="col-12">
														<div class="empty-results">
															<h3>Este curso no tiene lecciones...!</h3>
														</div>
													</div>
                                                    @endforelse
												</div>
											</div>
										</div>




										<div class="tab-pane fade" id="instructor" role="tabpanel" aria-labelledby="review-tab">
											<div class="cs_row_four csv2">
												<div class="about_ins_container">
													<h4 class="aii_title">Sobre el instructor</h4>
													<div class="about_ins_info">
														<div class="thumb"><img src="{{asset('img/resource/chef.png')}}" alt="{{$curso->instructor}}" style="width: 120px; height: 120px;"></div>
													</div>
													<div class="details">
														<ul class="review_list">
															<li class="list-inline-item"><i class="fa fa-star"></i></li>
															<li class="list-inline-item"><i class="fa fa-star"></i></li>
															<li class="list-inline-item"><i class="fa fa-star"></i></li>
															<li class="list-inline-item"><i class="fa fa-star"></i></li>
															<li class="list-inline-item"><i class="fa fa-star"></i></li>
															<li class="list-inline-item">8.5 Ranking</li>
														</ul>
														<ul class="about_info_list">
															<li class="list-inline-item"><span class="flaticon-comment"></span> 100 Reviews </li>
															<li class="list-inline-item"><span class="flaticon-profile"></span> 100 Estudantes </li>
															<li class="list-inline-item"><span class="flaticon-play-button-1"></span> +20 cursos </li>
														</ul>
														<h4>{{$curso->instructor}}</h4>
														<p class="subtitle">Chef de Pastelería y Decoración de tortas</p>
														<p class="mb25">Especialista en pastelería con más de 20 años de experiencia. </p>
														<p class="mb25">Habilidades: Pastelería, decoración, fondant, masas, merengues, glaseados.</p>
														<ul class="about_ins_list mb0">
															<li><p>Chef con reconocimiento en:</p></li>
															<li><a href="#">1. Argentina</a></li>
															<li><a href="#">2. Peru</a></li>
															<li><a href="#">3. Chile</a></li>
															<li><a href="#">4. Bolivia</a></li>
															<li><a href="#">5. Uruguay</a></li>
														</ul>
													</div>
												</div>
											</div>
										</div>


                                        <!-- Comentarios del curso -->
										<div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
											<div class="cs_row_five csv2">
												<div class="student_feedback_container">
													<h4 class="aii_title">Comentarios de los estudiantes</h4>
													<div class="s_feeback_content">
												        <ul class="skills">
												        	<li class="list-inline-item">Stars 5</li>
												            <li class="list-inline-item progressbar1" data-width="84" data-target="100">%84</li>
												        </ul>
												        <ul class="skills">
												        	<li class="list-inline-item">Stars 4</li>
												            <li class="list-inline-item progressbar2" data-width="9" data-target="100">%9</li>
												        </ul>
												        <ul class="skills">
												        	<li class="list-inline-item">Stars 3</li>
												            <li class="list-inline-item progressbar3" data-width="3" data-target="100">%3</li>
												        </ul>
												        <ul class="skills">
												        	<li class="list-inline-item">Stars 2</li>
												            <li class="list-inline-item progressbar4" data-width="1" data-target="100">%1</li>
												        </ul>
												        <ul class="skills">
												        	<li class="list-inline-item">Stars 1</li>
												            <li class="list-inline-item progressbar5" data-width="2" data-target="100">%2</li>
												        </ul>
													</div>
													<div class="aii_average_review text-center">
														<div class="av_content">
															<h2>4.5</h2>
															<ul class="aii_rive_list mb0">
																stars
															</ul>
															<p>Valoración del curso</p>
														</div>
													</div>
												</div>
                                            </div>

                                            <!-- DISQUS -->
                                            <!-- <div id="disqus_thread"></div>
                                            <script>
                                            /**
                                            *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                            *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                                            /*
                                            var disqus_config = function () {
                                            this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                                            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                            };
                                            */
                                            (function() { // DON'T EDIT BELOW THIS LINE
                                            var d = document, s = d.createElement('script');
                                            s.src = 'https://pastel-arte.disqus.com/embed.js';
                                            s.setAttribute('data-timestamp', +new Date());
                                            (d.head || d.body).appendChild(s);
                                            })();
                                            </script>
                                            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript> -->


											<div class="cs_row_six csv2">
												<div class="sfeedbacks">
													<div class="mbp_pagination_comments">
														@forelse($comentarios as $comentario)
														<div class="mbp_first media csv1">
															<img src="/storage/{{$comentario->user->avatar}}" class="mr-3" alt="review1.png">
															<div class="media-body">
														    	<h4 class="sub_title mt-0">{{$comentario->user->name}}
																	<span class="sspd_review float-right">
																		<ul>
																			<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
																			<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
																			<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
																			<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
																			<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
																			<li class="list-inline-item"></li>
																		</ul>
																	</span>
														    	</h4>
														    	<a class="sspd_postdate fz14" href="#">{{$comentario->created_at->diffForHumans()}}</a>
														    	<p class="fz15 mt25 mb25" id="comentario">{{$comentario->contenido}}</p> <div class="ssp_reply float-right"><span class="flaticon-consulting-message"></span></div>
															</div>
														</div>
														@empty
														<h1>no hay comentarios</h1>
														@endforelse
														<div class="custom_hr"></div>
													</div>
												</div>
											</div>

											<div class="cs_row_seven csv2">
												<div class="sfeedbacks">
													<div class="mbp_comment_form style2 pb0">
														<h4>Agregar comentario</h4>
														<ul>
															<li class="list-inline-item">
																<span class="sspd_review">
																	<ul>
																		<li class="list-inline-item"><a href="#"><i class="fa fa-star fz18"></i></a></li>
																		<li class="list-inline-item"><a href="#"><i class="fa fa-star fz18"></i></a></li>
																		<li class="list-inline-item"><a href="#"><i class="fa fa-star fz18"></i></a></li>
																		<li class="list-inline-item"><a href="#"><i class="fa fa-star fz18"></i></a></li>
																		<li class="list-inline-item"><a href="#"><i class="fa fa-star fz18"></i></a></li>
																		<li class="list-inline-item"></li>
																	</ul>
																</span>
															</li>
														</ul>
														<form action="{{route('cursos.comentarios.store', $curso)}}" id="comentarios" method="POST" class="comments_form">
														@method('POST')
														@csrf
															<input type="hidden" class="form-control" name="curso_id" id="curso_id" value="{{$curso->id}}" >
															<div class="form-group">
															    <label for="contenido">Contenido</label>
																<textarea class="form-control" id="contenido" name="contenido" placeholder="Ingresa tu comentario" rows="5">{{ old('contenido') }}</textarea>
															</div>
															<button type="submit" class="btn btn-thm">Publicar <span class="flaticon-right-arrow-1"></span></button>
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

					<div class="col-lg-12">
						<h3 class="r_course_title">Cursos Relacionados</h3>
					</div>

					<div class="row">
						<div class="col-lg-12">
							<div class="popular_course_slider">
							@forelse($cursos as $curso)
								<div class="item">
									<div class="top_courses home2 mb0">
										<div class="thumb">
											<img class="img-whp" src="/storage/{{$curso->thumbnail}}" alt="{{$curso->title}}" style="width: 307px; height:200px;  object-fit: cover; object-position: center center;">
											<div class="overlay">
												<a class="tc_preview_course"
												href="#"
												data-curso_title="{{$curso->title}}"
												data-curso_precio="{{$curso->precio}}"
												data-curso_instructor="{{$curso->instructor}}"
												data-toggle="modal"
												data-target="#curso1"
												><i class="fa fa-play" style="font-size: 30px;"></i></a>
											</div>
										</div>
										<div class="details">
											<div class="tc_content">
												<p>{{$curso->instructor}}</p>
												<h5>{{$curso->title}}</h5>
												<ul class="tc_review fn-414">
													stars
												</ul>
											</div>
											<div class="tc_footer">
												<ul class="tc_meta float-left">
													<li class="list-inline-item"><a href="#"><i class="flaticon-profile"></i></a></li>
													<li class="list-inline-item"><a href="#">30</a></li>
												</ul>
												<div class="tc_price float-right">${{$curso->precio}}</div>
											</div>
										</div>
									</div>
								</div>
							@empty
							<h1>No hay cursos relacionados</h1>
							@endforelse
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12 col-lg-4 col-xl-3">
					<div class="instructor_pricing_widget csv2">
						@if($curso->gratis)
						<span class="badge badge-success">
							<h3>Gratis</h3>
						</span>
						@elseif(!$curso->gratis)
						<div class="price">
							<span>Precio</span> ${{$curso->precio}}
						</div>
						<a href="#" class="cart_btnss">Agregar al carro</a>
						<a href="#" class="cart_btnss_white">Comprar ahora</a>
						<h5 class="subtitle text-left">Incluye</h5>
						<ul class="price_quere_list text-left">
							<li><span class="flaticon-key-1"></span> Acceso de por vida completo</li><br>
							<li><span class="flaticon-responsive"></span> Acceso en móvil, laptops, tablets y Tv</li><br>
							<li><span class="flaticon-flash"></span> Asignaciones</li><br>
							<li><span class="flaticon-award"></span> Certificación de finalización</li><br>
						</ul>
						@endif
					</div>
											
					<div class="feature_course_widget csv1">
						<ul class="list-group">
							<h4 class="title">Características del curso</h4>
							<li class="d-flex justify-content-between align-items-center">
								Lecciones <span class="float-right">{{$curso->lecciones->count()}}</span>
							</li>
							<li class="d-flex justify-content-between align-items-center">
								Duración del curso<span class="float-right">{{$curso->totalTime()}}</span>
							</li>
							<li class="d-flex justify-content-between align-items-center">
								Fecha de Publicación<span class="float-right">{{$curso->created_at->format('d/m/Y')}}</span>
							</li>
							<li class="d-flex justify-content-between align-items-center">
								Archivos del curso<span class="float-right">{{$curso->totalFileLeccion()}}</span>
							</li>
							<li class="d-flex justify-content-between align-items-center">
								Videos del curso<span class="float-right">{{$curso->totalVideoLeccion()}}</span>
							</li>
							<li class="d-flex justify-content-between align-items-center">
								Nivel de habilidad <span class="float-right">{{$curso->nivel_habilidad}}</span>
							</li>
							<li class="d-flex justify-content-between align-items-center">
								Lenguaje <span class="float-right">{{$curso->lenguaje}}</span>
							</li>
						</ul>
					</div>


					<div class="blog_recent_post_widget media_widget">
						<h4 class="title">Chef Beatriz Román</h4>
						<img src="{{ asset('img/gallery/chefroman.jpg') }}" alt="chefroman.jpg">
					</div>
				</div>

			</div>
		</div>
	</section>
@include('resources.modal_curso')
@endsection


@push('js')
<script src="{{asset('js/comentarios.js')}}"></script>
<script>
    // Modal para crear lección
	$('#curso1').on('show.bs.modal', function(event){
		var button = $(event.relatedTarget);
        var curso_title = button.data('curso_title');
		var curso_precio = button.data('curso_precio');
		var curso_instructor = button.data('curso_instructor');
        console.log(carrera_id);

		var modal = $(this);

        modal.find('.modal-body #titulo').val(curso_title);
        modal.find('.modal-body #precio').val(curso_precio);
        modal.find('.modal-body #instructor').val(curso_instructor);
	});
</script>

@endpush