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
                        @include('admin.layouts.nav-admin', ['title' => 'Mis Deseos', 'page' => 'Cursos deseados'] )
						</div>
						<div class="col-lg-12">
							<div class="my_course_content_container">
								<div class="my_course_content mb30">
                                    <div class="my_course_content_header">
                                        <div class="col-xl-4">
                                            <div class="instructor_search_result style2">
                                                <h4 class="mt10">{{ __("Tu lista de deseos") }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                @include('custom.message')
                                @forelse($wishlist as $item)
                                <div class="my_course_content_list">
                                    <div class="mc_content_list">
                                        <div class="thumb">
                                            <img class="img-whp" src="/storage/{{$item->curso->thumbnail}}" alt="{{$item->curso->slug}}">
                                            <div class="overlay"></div>
                                        </div>
                                        <div class="details">
                                            <div class="mc_content">
                                                <p class="subtitle">Carrera: {{$item->curso->carrera->title}}</p>
                                                <h5 class="title">{{$item->curso->title}}</h5>
                                                <p>{{$item->curso->extracto}}</p>
                                            </div>
                                            <div class="mc_footer">
                                                <ul class="mc_meta fn-414">
                                                    <li class="list-inline-item"><a href="#"><i class="flaticon-profile"></i></a></li>
                                                    <li class="list-inline-item"><a href="#">{{$item->curso->estudiantes->count()}}</a></li>
                                                    <li class="list-inline-item"><a href="#"><i class="flaticon-comment"></i></a></li>
                                                    <li class="list-inline-item"><a href="#">{{$item->curso->reviews->count()}}</a></li>
                                                </ul>
                                                <ul class="mc_review fn-414">
                                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star{{ $item->curso->rating >= 1 ? ' yellow' : '' }}"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star{{ $item->curso->rating >= 2 ? ' yellow' : '' }}"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star{{ $item->curso->rating >= 3 ? ' yellow' : '' }}"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star{{ $item->curso->rating >= 4 ? ' yellow' : '' }}"></i></a></li>
                                                    <li class="list-inline-item"><a href="#"><i class="fa fa-star{{ $item->curso->rating >= 5 ? ' yellow' : '' }}"></i></a></li>
                                                    <!-- hide counter on reviews loop -->
                                                    @if(!isset($hideCounter))
                                                        <li class="list-inline-item">
                                                            <a href="#">({{ $item->curso->reviews->count() }})</a>
                                                        </li>
                                                    @endif
                                                    <li class="list-inline-item tc_price fn-414"><a href="#">${{$item->curso->precio}}</a></li>
                                                </ul>
                                                <ul class="mc_meta fn-414">
                                                    <a href="{{ route("add_curso_to_cart", ["curso" => $item->curso]) }}" class="cart_btnss_white_wishlist">Comprar ahora</a>
												</ul>
                                                <ul class="view_edit_delete_list float-right">
                                                    <li class="list-inline-item"><a href="{{route('cursos.show', $item->curso->slug)}}" data-toggle="tooltip" data-placement="top" title="Ver Curso"><span class="flaticon-preview"></span></a></li>
                                                    
                                                    <li class="list-inline-item"><a href="{{ route("estudiante.wishlist.destroy", ["id" => $item->id]) }}" data-toggle="tooltip" data-placement="top" title="Eliminar de la lista"><span class="flaticon-delete-button"></span></a></li>


                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="text-center">
                                    <div class="empty-results">
                                        {!! __("No tienes ningún curso en tu lista de deseos") !!}
                                    </div>
                                </div>
                                @endforelse
									
								</div>
							</div>
						</div>
                        <div class="row">
                            @if(count($wishlist))
                                {{ $wishlist->links() }}
                            @endif
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
