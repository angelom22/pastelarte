@extends('admin.layouts.app')

@push('css')
    
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
                        @include('admin.layouts.nav-admin', ['title' => 'Lista de cursos', 'page' => 'Mis cursos'] )
						</div>
						<div class="col-lg-12">
                            <div class="my_course_content mb30">
                                <div class="my_course_content_header">
                                    <div class="col-xl-4">
                                        <div class="instructor_search_result style2">
                                            <h4 class="mt10">Mi lista de cursos</h4>
                                        </div>
                                    </div>
                                    <div class="col-xl-8">
                                        <div class="candidate_revew_select style2 text-right">
                                            <ul class="mb0">
                                                <li class="list-inline-item">
                                                    <select class="selectpicker show-tick">
                                                        <option>Newly published</option>
                                                        <option>Recent</option>
                                                        <option>Old Review</option>
                                                    </select>
                                                </li>
                                                <li class="list-inline-item">
                                                    <div class="candidate_revew_search_box course fn-520">
                                                        <form class="form-inline my-2 my-lg-0">
                                                            <input class="form-control mr-sm-2" type="search" placeholder="Search our instructors" aria-label="Search">
                                                            <button class="btn my-2 my-sm-0" type="submit"><span class="flaticon-magnifying-glass"></span></button>
                                                        </form>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @include('custom.message')
                                <div class="my_course_content_list">
                                    @forelse($cursos as $curso)
                                    <div class="mc_content_list style2">
                                        <div class="thumb">
                                            <img class="img-whp" style="width: 307px; object-fit: cover;" src="/storage/{{$curso->thumbnail}}" alt="{{$curso->slug}}">
                                            <div class="overlay">
                                                <ul class="mb0">
                                                    <li class="list-inline-item">
                                                        <a class="mcc_view" href="{{ route('cursos.aprende', ['curso' => $curso]) }}">{{ __("Ver el curso") }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="details">
                                            <div class="mc_content">
                                                <p class="subtitle">Carrera: {{$curso->carrera->title}}</p>
                                                <h5 class="title">{{$curso->title}}<span><small class="tag">Published</small></span></h5>
                                                <p>{{$curso->extracto}}</p>
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
                                                <ul class="skills float-right">
                                                    <li class="progressbar3" data-width="92" data-target="92"><span class="float-right">92% Complete</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @empty
                                    <div class="container">
                                        <div class="empty-results">
                                        {!! __("No tienes ningún curso todavía: :link", ["link" => "<a href='".route('cursos.index')."'>Ir a ver los cursos</a>"]) !!}
                                        </div>
                                    </div>
                                    @endforelse
                                </div>
                                <div class="row text-center">
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

@push('js')
    
@endpush


