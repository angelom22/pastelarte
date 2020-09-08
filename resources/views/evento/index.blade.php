@extends('layouts.app')

@section('content')

	<!-- Inner Page Breadcrumb -->
	<section class="inner_page_breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 offset-xl-3 text-center">
					<div class="breadcrumb_content">
						<h4 class="breadcrumb_title">Event</h4>
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Event</li>
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
					<div class="main_blog_post_content">
						<div class="row event_lists p0">
							<div class="col-xl-5 pr15-xl pr0">
								<div class="blog_grid_post event_lists mb35">
									<div class="thumb">
										<img class="img-fluid w100" src="img/blog/el1.jpg" alt="el1.jpg">
										<div class="post_date"><h2>28</h2> <span>DECEMBER</span></div>
									</div>
								</div>
							</div>
							<div class="col-xl-7 pl15-xl pl0">
								<div class="blog_grid_post style2 event_lists mb35">
									<div class="details">
										<h3>Everything is Teachable</h3>
										<p>Lorem gravida nibh vel veliauctor aliquenean sollicitudin, lorem quis bibendum auctor nisi elit consequat ipsutis sem nibh id elit.</p>
										<ul class="mb0">
											<li><a href="#"><span class="flaticon-appointment"></span> Date: 06.09.2019 - 06.09.2020</a></li>
											<li><a href="#"><span class="flaticon-clock"></span>Time: 8:00 am - 5:00 pm</a></li>
											<li><a href="#"><span class="flaticon-placeholder"></span>Address: Cambridge, MA 02138, USA</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="main_blog_post_content">
						<div class="row event_lists p0">
							<div class="col-xl-5 pr15-xl pr0">
								<div class="blog_grid_post event_lists mb35">
									<div class="thumb">
										<img class="img-fluid w100" src="img/blog/el1.jpg" alt="el1.jpg">
										<div class="post_date"><h2>28</h2> <span>DECEMBER</span></div>
									</div>
								</div>
							</div>
							<div class="col-xl-7 pl15-xl pl0">
								<div class="blog_grid_post style2 event_lists mb35">
									<div class="details">
										<h3>Everything is Teachable</h3>
										<p>Lorem gravida nibh vel veliauctor aliquenean sollicitudin, lorem quis bibendum auctor nisi elit consequat ipsutis sem nibh id elit.</p>
										<ul class="mb0">
											<li><a href="#"><span class="flaticon-appointment"></span> Date: 06.09.2019 - 06.09.2020</a></li>
											<li><a href="#"><span class="flaticon-clock"></span>Time: 8:00 am - 5:00 pm</a></li>
											<li><a href="#"><span class="flaticon-placeholder"></span>Address: Cambridge, MA 02138, USA</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>



					
				</div>
			</div>
		</div>
	</section>

@endsection