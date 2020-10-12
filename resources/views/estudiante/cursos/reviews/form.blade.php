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
                        @include('admin.layouts.nav-admin', ['title' => 'Valoración', 'page' => 'valoración'] )
						</div>
						<div class="col-lg-12">
                            <div class="container">
                                <div id="review-card" class="col-xs-12 p-5">
                                    <div class="card">
                                        <div class="card-header text-center">
                                            {{ __("Añade una valoración al curso") }}
                                        </div>
                                        <div class="card-body">
                                            @include("custom.message")
                                            <form
                                                method="POST"
                                                action="{{ route('reviews.store', ['curso' => $curso]) }}"
                                                id="rating_form" class="comments_form"
                                            >
                                                @csrf
                                                <input type="hidden" name="stars" value="1" />
                                                <input type="hidden" name="curso_id" value="{{$curso}}" />

                                                <div class="row">
                                                    
                                                    <div class="col-12 text-center">
                                                        <ul id="list_rating" class="list-inline" style="font-size: 40px;">
                                                            <li class="list-inline-item star" data-number="1">
                                                                <i class="fa fa-star yellow"></i>
                                                            </li>
                                                            <li class="list-inline-item star" data-number="2">
                                                                <i class="fa fa-star"></i>
                                                            </li>
                                                            <li class="list-inline-item star" data-number="3">
                                                                <i class="fa fa-star"></i>
                                                            </li>
                                                            <li class="list-inline-item star" data-number="4">
                                                                <i class="fa fa-star"></i>
                                                            </li>
                                                            <li class="list-inline-item star" data-number="5">
                                                                <i class="fa fa-star"></i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <textarea
                                                                placeholder="{{ __("Escribe una reseña") }}"
                                                                id="review"
                                                                name="review"
                                                                class="form-control"
                                                                rows="4"
                                                            >{{ old('review') }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mt-2">
                                                    <div class="col-12">
                                                        <button type="submit" class="my_setting_savechange_btn btn btn-thm">
                                                            <i class="fa fa-space-shuttle"></i> {{ __("Valorar curso") }}
                                                        </button>
                                                        <a href="{{ route("cursos.aprende", ["curso" => $curso]) }}" class="my_setting_savechange_btn btn btn-thm3 btn-lg p-2 ">
                                                            <i class="fa fa-arrow-left"></i> {{ __("Volver al curso") }}
                                                        </a>
                                                    </div>
                                                </div>
                                            </form>
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
<script src="{{asset('js/comentarios.js')}}"></script>
<script>
    jQuery(document).ready(function() {
        const ratingSelector = jQuery('#list_rating');
        ratingSelector.find('li').on('click', function () {
            const number = $(this).data('number');
            $("#rating_form").find('input[name=stars]').val(number);
            ratingSelector.find('li i').removeClass('yellow').each(function(index) {
                if ((index + 1) <= number) {
                    $(this).addClass('yellow');
                }
            })
        })
    });
</script>
@endpush