
<!-- Top Courses -->
<section id="top-courses" class="top-courses pb30">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="main-title text-center">
                        <h3 class="mt0">Explore nuestros mejores cursos</h3>
                        <p>Bienvenidos al mundo dulce de la Chef Beatriz Román.</p>
					</div>
				</div>
			</div>
			<div class="row">
			 	<div class="col-lg-12">
			 		<div id="options" class="alpha-pag full">
						<div class="option-isotop">
							<ul id="filter" class="option-set" data-option-key="filter">
                                <li class="list-inline-item"><a href="#all" data-option-value="*">Todos</a></li>
                            @foreach($carreras as $carrera)
                                <li class="list-inline-item"><a href="#{{$carrera->slug}}" data-option-value=".{{$carrera->slug}}">{{$carrera->title}}</a></li>
                            @endforeach

							</ul>
						</div>
					</div><!-- FILTER BUTTONS -->
			 		<div class="emply-text-sec">
			 			<div class="row" id="masonry_abc">
						 	
							@forelse($cursosFeatured as $curso)
							
                             <div class="col-md-6 col-lg-4 col-xl-3  {{$curso->carrera->slug}} ">
								<div class="top_courses">
									<div class="thumb">
										<img style="width: 300px; height: 250px;" class="img-whp" src="/storage/{{$curso->thumbnail}}" alt="{{$curso->slug}}">
                                        <div class="overlay">
                                            <div class="tag" style="background: #441c42;">{{ $curso->status === '1' ? 'Destacado' : '' }} </div>
											@auth
											<div class="icon">
												@if($curso->wishedForUser())
												<i
													class="flaticon-like text-danger toggle-wish"
													data-route="{{ route("estudiante.wishlist.toggle", ["curso" => $curso]) }}"
												></i>
												@else
												<i
													class="flaticon-like toggle-wish"
													data-route="{{ route("estudiante.wishlist.toggle", ["curso" => $curso]) }}"
												></i>
												@endif
											</div>
											@endauth
                                            <!-- <a class="tc_preview_course" href="#" data-toggle="modal" data-target="#CursoResumen_{{ $curso->id }}"><i class="fa fa-play" style="font-size: 30px;"></i></a> -->
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
											<div class="tc_price float-right">${{$curso->precio}}</div>
										</div>
									</div>
								</div>
                            </div>
							
                            @empty
							<div class="col-12">
								<div class="empty-results">
									<h3>No hay ningún curso relacionado con tu busqueda...!</h3>
								</div>
							</div>
							@endforelse

			 			</div>
			 		</div>
				</div>
			</div>
		</div>
	</section>
