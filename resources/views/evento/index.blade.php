@extends('layouts.app')

@section('content')

	<!-- Inner Page Breadcrumb -->
	<section class="inner_page_breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 offset-xl-3 text-center">
					<div class="breadcrumb_content">
						<h4 class="breadcrumb_title">Eventos</h4>
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Eventos</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>



	<!-- Main Blog Post Content -->
	<section class="blog_post_container">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					@foreach($events as $event)
					<div class="main_blog_post_content">
						<div class="row event_lists p0">
							<div class="col-xl-5 pr15-xl pr0">
								<div class="blog_grid_post event_lists mb35">
									<div class="thumb">
										<img class="img-fluid w100" src="{{ asset('storage/'.$event->file)}}" alt="{{$event->slug}}" style="width: 600px; height:385px;">
										<div class="post_date"><h2>{{$event->created_at->format('d')}}</h2> <span>{{$event->created_at->format('M')}}</span></div>
									</div>
								</div>
							</div>
							<div class="col-xl-7 pl15-xl pl0">
								<div class="blog_grid_post style2 event_lists mb35">
									<div class="details">
										<a href="{{route('evento.show', $event->slug)}}"><h3>{{$event->title}}</h3></a>
										<p>{{$event->extracto}}</p>
										<ul class="mb0">
											<li><a href="#"><span class="flaticon-appointment"></span> Fecha: {{$event->fecha->format('d-m-Y')}}</a></li>
											<li><a href="#"><span class="flaticon-clock"></span>Hora: {{$event->hora->format('h:i:s')}}</a></li>
											<li><a href="#"><span class="flaticon-placeholder"></span>Diección: {{$event->direccion}}</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					<div class="row">
                        <div class="col-lg-12">
                            <div class="mbp_pagination mt20">
                                <ul class="page_navigation">
                                    <!-- <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1" aria-disabled="true"> <span class="flaticon-left-arrow"></span> Prev</a>
                                    </li> -->
                                    {{ $events->links() }}
                                    <!-- <li class="page-item">
                                        <a class="page-link" href="#">Next <span class="flaticon-right-arrow-1"></span></a>
                                    </li> -->
                                </ul>
                            </div> 
                        </div>
                    </div>
				
				</div>
			</div>
		</div>
	</section>

@endsection