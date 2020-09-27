@extends('layouts.app')

@section('content')



<!-- Inner Page Breadcrumb -->
	<section class="inner_page_breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 offset-xl-3 text-center">
					<div class="breadcrumb_content">
						<h4 class="breadcrumb_title">CURSOS DE PASTELERÍA Y DECORACIÓN DE TORTAS</h4>
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
    <!-- Our Team Members -->



{{-- @foreach($cursos as $curso)

@endforeach --}}


    <section class="our-team pb50">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8 col-xl-9">
                    <div class="row">
                        <div class="col-sm-6 col-lg-6 col-xl-6">
                            <div class="instructor_search_result">
                                <p class="mt10 fz15"><span class="color-dark pr10">15 results</span></p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-6 col-xl-6">
                            <div class="candidate_revew_select text-right tac-xsd mb25">
                                <ul>
                                    <li class="list-inline-item">
                                        <select class="selectpicker show-tick">
                                            <option>Todos</option>
                                            <option>Gratis</option>
                                            <option>Pagos</option>
                                        </select>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">



                            <div class="col-sm-6 col-lg-6 col-xl-4">
                            <div class="top_courses">
                                <div class="thumb">
                                    <img class="img-whp" src="{{ asset('img/courses/t1.jpg') }}" alt="t1.jpg">
                                    <div class="overlay">
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
                                        </ul>
                                        <div class="tc_price float-right">$30.00 </div>
                                    </div>
                                    <div class="tc_footer">
                                        <a class="float-right" href="#">Agregar al carro <span class="flaticon-shopping-bag" style="font-size: 20px; color: red;"></span></a>
                                    </div>
                                </div>
                            </div>
                            </div>





                        <div class="col-lg-12">
                            <div class="mbp_pagination mt20">
                                <ul class="page_navigation">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true"> <span class="flaticon-left-arrow"></span> Prev</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active" aria-current="page">
                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#">14</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next <span class="flaticon-right-arrow-1"></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="col-lg-4 col-xl-3">

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