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
    <section class="our-team pb50">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8 col-xl-9">
                    <div class="row">
                        <div class="col-sm-6 col-lg-6 col-xl-6">
                            <div class="instructor_search_result">
                                <p class="mt10 fz15"><span class="color-dark pr10">{{$cursos->count()}} Resultados</span></p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-6 col-xl-12">
                            <div class="candidate_revew_select text-right tac-xsd mb25">
                                <ul class="mb0">
                                    <li class="list-inline-item">
                                        <div class="candidate_revew_search_box course fn-520">
                                            <!-- BUSCADOR DE CURSOS -->
                                            <form action="{{route('cursos.search')}}" method="POST" class="form-inline my-2 my-lg-0">
                                            @method('POST')
                                            @csrf
                                                <input class="form-control mr-sm-2" type="search" placeholder="Buscar Cursos..." aria-label="Search" aria-describedby="search" autocomplete="off" value="{{session('search[cursos]')}}" name="search">
                                                <button class="btn my-2 my-sm-0" type="submit"><span class="flaticon-magnifying-glass" id="search" aria-hidden="true"></span></button>
                                            </form>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @forelse($cursos as $curso)
                        <div class="col-sm-6 col-lg-6 col-xl-4">
                            <div class="top_courses">
                                <div class="thumb">
                                    <img class="img-whp" style="width: 307px; height: 200px;" src="/storage/{{$curso->thumbnail}}" alt="{{$curso->slug}}">
                                    <div class="overlay">
                                        <a class="tc_preview_course" href="#" id="curso_id" data-toggle="modal" data-target="#CursoResumen" ><i class="fa fa-play" style="font-size: 30px;"></i></a>
                                    </div>
                                </div>
                                <div class="details">
                                    <div class="tc_content">
                                        <p>{{$curso->instructor}}</p>
                                        <h5><a href="{{route('cursos.show', $curso->slug)}}">{{$curso->title}}</a></h5>
                                        @include('estudiante.cursos.resources.valoraciones', ['rating' => $curso->rating])
                                    </div>
                                    <div class="tc_footer">
                                        <ul class="tc_meta float-left">
                                            <li class="list-inline-item"><a href="#"><i class="flaticon-profile"></i></a></li>
                                            <li class="list-inline-item"><a href="#">{{$curso->estudiantes_count}}</a></li>
                                            <li class="list-inline-item"><a href="#"><i class="flaticon-comment"></i></a></li>
                                            <li class="list-inline-item"><a href="#">{{$curso->reviews->count()}}</a></li>
                                        </ul>
                                        <div class="tc_price float-right">${{$curso->precio}} </div>
                                    </div>
                                    <div class="tc_footer">
                                    
                                        <a class="float-right" href="{{ route("add_curso_to_cart",  $curso) }}">Agregar al carro <span class="flaticon-shopping-bag" style="font-size: 20px; color: red;"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('cursos.resources.modal_curso')
                        @empty
                        <div class="col-12">
                            <div class="empty-results">
                                <h3>No hay ningún curso relacionado con tu busqueda...!</h3>
                            </div>
                        </div>
                        @endforelse
                        <div class="col-lg-12">
                            <div class="mbp_pagination mt20">
                                <ul class="page_navigation">
                                    @if(count($cursos))
                                        {{ $cursos->links() }}
                                    @endif
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
                                                <label for="customCheck14">Técnicas de pastelería</label>
                                            </div>

                                            <div class="custom-control">
                                                <label for="customCheck14">Masas</label>
                                            </div>

                                             <div class="custom-control">
                                                <label for="customCheck14">Decoración de tortas comerciales</label>
                                            </div>

                                             <div class="custom-control">
                                                <label for="customCheck14">Técnicas de Fondant</label>
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




@endsection

@push('js')

@endpush