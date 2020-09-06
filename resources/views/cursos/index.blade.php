@extends('layouts.app')

@section('content')



<!-- Inner Page Breadcrumb -->
	<section class="inner_page_breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 offset-xl-3 text-center">
					<div class="breadcrumb_content">
						<h4 class="breadcrumb_title">CURSOS</h4>
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Cursos</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>





<!-- CURSOS -->
<!-- CURSOS -->
<!-- CURSOS -->
<!-- CURSOS -->
<!-- CURSOS -->
<!-- CURSOS -->
<section id="top-courses" class="top-courses">
<div class="container-fluid">
			<div class="row">


<!-- LISTA DE CURSOS -->
<!-- LISTA DE CURSOS -->
<!-- LISTA DE CURSOS -->
<!-- LISTA DE CURSOS -->

			 	<div class="col-lg-9">
			 		<div id="options" class="alpha-pag full">
						<div class="option-isotop">
							<ul id="filter" class="option-set" data-option-key="filter">
								<li class="list-inline-item"><a href="#all" data-option-value="*" class="selected">Todos los cursos</a></li>
								<li class="list-inline-item"><a href="#pasteleria" data-option-value=".pasteleria">Pastelería</a></li>
								<li class="list-inline-item"><a href="#decoracion" data-option-value=".decoracion">Decoración de tortas</a></li>
								<li class="list-inline-item"><a href="#gratuitos" data-option-value=".gratuitos">Cursos gratuitos</a></li>
							</ul>
						</div>
					</div><!-- FILTER BUTTONS -->
			 		<div class="emply-text-sec">
			 			<div class="row" id="masonry_abc">

                    <div class="col-md-6 col-lg-4 pasteleria">
                            <div class="top_courses">
                                <div class="thumb">
                                    <img class="img-whp" src="{{ asset('img/courses/t1.jpg') }}" alt="t1.jpg">
                                    <div class="overlay">
                                        <div class="tag" style="background: #441c42;">nuevo</div>
                                        <div class="icon" style="background: #441c42; font-size: 15px;">decoración</div>
                                        <a class="tc_preview_course" href="#" data-toggle="modal" data-target="#curso1"><i class="fa fa-play" style="font-size: 30px;"></i></a>
                                    </div>
                                </div>
                                <div class="details">
                                    <div class="tc_content">
                                        <p>Beatriz Román</p>
                                        <h5>Curso de decoración con papel de arróz</h5>
                                        <ul class="tc_review">
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#">(6)</a></li>
                                        </ul>
                                    </div>
                                    <div class="tc_footer">
                                        <ul class="tc_meta float-left">
                                            <li class="list-inline-item"><a href="#"><i class="flaticon-profile"></i></a></li>
                                            <li class="list-inline-item"><a href="#">30</a></li>
                                            <li class="list-inline-item"><a href="#"><i class="flaticon-comment"></i></a></li>
                                            <li class="list-inline-item"><a href="#">10</a></li>
                                        </ul>
                                        <div class="tc_price float-right">$30.00</div>
                                    </div>
                                </div>
                            </div>
                        </div> 

                    	<div class="col-md-6 col-lg-4 gratuitos">
                            <div class="top_courses">
                                <div class="thumb">
                                    <img class="img-whp" src="{{ asset('img/courses/t1.jpg') }}" alt="t1.jpg">
                                    <div class="overlay">
                                        <div class="tag" style="background: #441c42;">nuevo</div>
                                        <div class="icon" style="background: #441c42; font-size: 15px;">decoración</div>
                                        <a class="tc_preview_course" href="#" data-toggle="modal" data-target="#curso1"><i class="fa fa-play" style="font-size: 30px;"></i></a>
                                    </div>
                                </div>
                                <div class="details">
                                    <div class="tc_content">
                                        <p>Beatriz Román</p>
                                        <h5>Curso de decoración con papel de arróz</h5>
                                        <ul class="tc_review">
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#">(6)</a></li>
                                        </ul>
                                    </div>
                                    <div class="tc_footer">
                                        <ul class="tc_meta float-left">
                                            <li class="list-inline-item"><a href="#"><i class="flaticon-profile"></i></a></li>
                                            <li class="list-inline-item"><a href="#">30</a></li>
                                            <li class="list-inline-item"><a href="#"><i class="flaticon-comment"></i></a></li>
                                            <li class="list-inline-item"><a href="#">10</a></li>
                                        </ul>
                                        <div class="tc_price float-right">$30.00</div>
                                    </div>
                                </div>
                            </div>
                        </div> 


                        <div class="col-md-6 col-lg-4 decoracion">
                            <div class="top_courses">
                                <div class="thumb">
                                    <img class="img-whp" src="{{ asset('img/courses/t1.jpg') }}" alt="t1.jpg">
                                    <div class="overlay">
                                        <div class="tag" style="background: #441c42;">nuevo</div>
                                        <div class="icon" style="background: #441c42; font-size: 15px;">decoración</div>
                                        <a class="tc_preview_course" href="#" data-toggle="modal" data-target="#curso1"><i class="fa fa-play" style="font-size: 30px;"></i></a>
                                    </div>
                                </div>
                                <div class="details">
                                    <div class="tc_content">
                                        <p>Beatriz Román</p>
                                        <h5>Curso de decoración con papel de arróz</h5>
                                        <ul class="tc_review">
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#">(6)</a></li>
                                        </ul>
                                    </div>
                                    <div class="tc_footer">
                                        <ul class="tc_meta float-left">
                                            <li class="list-inline-item"><a href="#"><i class="flaticon-profile"></i></a></li>
                                            <li class="list-inline-item"><a href="#">30</a></li>
                                            <li class="list-inline-item"><a href="#"><i class="flaticon-comment"></i></a></li>
                                            <li class="list-inline-item"><a href="#">10</a></li>
                                        </ul>
                                        <div class="tc_price float-right">$30.00</div>
                                    </div>
                                </div>
                            </div>
                        </div> 


                       <div class="col-md-6 col-lg-4 decoracion">
                            <div class="top_courses">
                                <div class="thumb">
                                    <img class="img-whp" src="{{ asset('img/courses/t1.jpg') }}" alt="t1.jpg">
                                    <div class="overlay">
                                        <div class="tag" style="background: #441c42;">nuevo</div>
                                        <div class="icon" style="background: #441c42; font-size: 15px;">decoración</div>
                                        <a class="tc_preview_course" href="#" data-toggle="modal" data-target="#curso1"><i class="fa fa-play" style="font-size: 30px;"></i></a>
                                    </div>
                                </div>
                                <div class="details">
                                    <div class="tc_content">
                                        <p>Beatriz Román</p>
                                        <h5>Curso de decoración con papel de arróz</h5>
                                        <ul class="tc_review">
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#">(6)</a></li>
                                        </ul>
                                    </div>
                                    <div class="tc_footer">
                                        <ul class="tc_meta float-left">
                                            <li class="list-inline-item"><a href="#"><i class="flaticon-profile"></i></a></li>
                                            <li class="list-inline-item"><a href="#">30</a></li>
                                            <li class="list-inline-item"><a href="#"><i class="flaticon-comment"></i></a></li>
                                            <li class="list-inline-item"><a href="#">10</a></li>
                                        </ul>
                                        <div class="tc_price float-right">$30.00</div>
                                    </div>
                                </div>
                            </div>
                        </div> 


                        <div class="col-md-6 col-lg-4 pasteleria">
                            <div class="top_courses">
                                <div class="thumb">
                                    <img class="img-whp" src="{{ asset('img/courses/t1.jpg') }}" alt="t1.jpg">
                                    <div class="overlay">
                                        <div class="tag" style="background: #441c42;">nuevo</div>
                                        <div class="icon" style="background: #441c42; font-size: 15px;">decoración</div>
                                        <a class="tc_preview_course" href="#" data-toggle="modal" data-target="#curso1"><i class="fa fa-play" style="font-size: 30px;"></i></a>
                                    </div>
                                </div>
                                <div class="details">
                                    <div class="tc_content">
                                        <p>Beatriz Román</p>
                                        <h5>Curso de decoración con papel de arróz</h5>
                                        <ul class="tc_review">
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#">(6)</a></li>
                                        </ul>
                                    </div>
                                    <div class="tc_footer">
                                        <ul class="tc_meta float-left">
                                            <li class="list-inline-item"><a href="#"><i class="flaticon-profile"></i></a></li>
                                            <li class="list-inline-item"><a href="#">30</a></li>
                                            <li class="list-inline-item"><a href="#"><i class="flaticon-comment"></i></a></li>
                                            <li class="list-inline-item"><a href="#">10</a></li>
                                        </ul>
                                        <div class="tc_price float-right">$30.00</div>
                                    </div>
                                </div>
                            </div>
                        </div> 

                        <div class="col-md-6 col-lg-4 pasteleria">
                            <div class="top_courses">
                                <div class="thumb">
                                    <img class="img-whp" src="{{ asset('img/courses/t1.jpg') }}" alt="t1.jpg">
                                    <div class="overlay">
                                        <div class="tag" style="background: #441c42;">nuevo</div>
                                        <div class="icon" style="background: #441c42; font-size: 15px;">decoración</div>
                                        <a class="tc_preview_course" href="#" data-toggle="modal" data-target="#curso1"><i class="fa fa-play" style="font-size: 30px;"></i></a>
                                    </div>
                                </div>
                                <div class="details">
                                    <div class="tc_content">
                                        <p>Beatriz Román</p>
                                        <h5>Curso de decoración con papel de arróz</h5>
                                        <ul class="tc_review">
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                            <li class="list-inline-item"><a href="#">(6)</a></li>
                                        </ul>
                                    </div>
                                    <div class="tc_footer">
                                        <ul class="tc_meta float-left">
                                            <li class="list-inline-item"><a href="#"><i class="flaticon-profile"></i></a></li>
                                            <li class="list-inline-item"><a href="#">30</a></li>
                                            <li class="list-inline-item"><a href="#"><i class="flaticon-comment"></i></a></li>
                                            <li class="list-inline-item"><a href="#">10</a></li>
                                        </ul>
                                        <div class="tc_price float-right">$30.00</div>
                                    </div>
                                </div>
                            </div>
                        </div> 


			 			</div>
			 		</div>
				</div>

<!-- CONTENIDO LATERAL DERECHO -->
<!-- CONTENIDO LATERAL DERECHO -->
<!-- CONTENIDO LATERAL DERECHO -->
<!-- CONTENIDO LATERAL DERECHO -->



				<div class="col-lg-3">

					<div class="selected_filter_widget style2 mb30">
					  	<div id="accordion" class="panel-group">
						    <div class="panel">
						      	<div class="panel-heading">
							      	<h4 class="panel-title">
							        	<a href="#panelBodySoftware" class="accordion-toggle link fz20 mb15" data-toggle="collapse" data-parent="#accordion">Cursos más demandados</a>
							        </h4>
						      	</div>
							    <div id="panelBodySoftware" class="panel-collapse collapse show">
							        <div class="panel-body">
										<div class="ui_kit_checkbox">

											<div class="custom-control">
												<label for="customCheck14"><a href="#">Técnicas de pastelería</a></label>
											</div>

                                            <div class="custom-control">
                                                <label for="customCheck14"> <a href="#">Masas</a></label>
                                            </div>

                                             <div class="custom-control">
                                                <label for="customCheck14"> <a href="#">Decoración de tortas comerciales</a></label>
                                            </div>

                                             <div class="custom-control">
                                                <label for="customCheck14"> <a href="#">Técnicas de Fondant</a></label>
                                            </div>
										</div>
							        </div>
							    </div>
						    </div>
						</div>
					</div>


					<div class="selected_filter_widget style2">
					  	<div id="accordion" class="panel-group">
						    <div class="panel">
						      	<div class="panel-heading">
							      	<h4 class="panel-title">
							        	<a href="#panelBodyAuthors" class="accordion-toggle link fz20 mb15" data-toggle="collapse" data-parent="#accordion">Chef Beatriz Román</a>
							        </h4>
						      	</div>
							    <div id="panelBodyAuthors" class="panel-collapse collapse show">
							        <div class="panel-body">
										<div class="cl_skill_checkbox">
                                            <img src="{{ asset('img/gallery/chefroman.jpg') }}" alt="chefroman.jpg">
										</div>
							        </div>
							    </div>
						    </div>
						</div>
					</div>



					<div class="selected_filter_widget style2">
						<h4 class="mt15 fz20 fw500">50% DESCUENTO</h4>
						<br>
						<h4 class="mt15 fz20 fw500">En nuestros cursos de pastelería</h4>
					</div>
				</div>
			</div>
</div>
</section>






@include('resources.modal_curso')


@endsection