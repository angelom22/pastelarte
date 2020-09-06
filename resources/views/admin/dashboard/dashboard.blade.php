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
							<nav class="breadcrumb_widgets" aria-label="breadcrumb mb30">
								<h4 class="title float-left">Dashboard</h4>
								<ol class="breadcrumb float-right">
							    	<li class="breadcrumb-item"><a href="#">Home</a></li>
							    	<li class="breadcrumb-item active" aria-current="page">Dashboard</li>
								</ol>
							</nav>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="ff_one">
								<div class="icon"><span class="flaticon-speech-bubble"></span></div>
								<div class="detais">
									<p>Messages</p>
									<div class="timer">45</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="ff_one style2">
								<div class="icon"><span class="flaticon-rating"></span></div>
								<div class="detais">
									<p>Reviews</p>
									<div class="timer">567</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="ff_one style3">
								<div class="icon"><span class="flaticon-online-learning"></span></div>
								<div class="detais">
									<p>Courses</p>
									<div class="timer">2,589</div>
								</div>
							</div>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 col-xl-3">
							<div class="ff_one style4">
								<div class="icon"><span class="flaticon-like"></span></div>
								<div class="detais">
									<p>Bookmarks</p>
									<div class="timer">27</div>
								</div>
							</div>
						</div>
						<div class="col-xl-8">
							<div class="application_statics">
								<h4>Your Profile Views</h4>
								<div class="c_container"></div>
							</div>
						</div>
						<div class="col-xl-4">
							<div class="recent_job_activity">
								<h4 class="title">Notifications</h4>
								<div class="grid">
									<ul>
										<li><div class="title">Status Update</div></li>
										<li><p>This is an automated server response message. All systems are online.</p></li>
									</ul>
								</div>
								<div class="grid">
									<ul>
										<li><div class="title">Status Update</div></li>
										<li><p>This is an automated server response message. All systems are online.</p></li>
									</ul>
								</div>
								<div class="grid">
									<ul>
										<li><div class="title">Status Update</div></li>
										<li><p>This is an automated server response message. All systems are online.</p></li>
									</ul>
								</div>
								<div class="grid">
									<ul>
										<li><div class="title">Status Update</div></li>
										<li><p>This is an automated server response message. All systems are online.</p></li>
									</ul>
								</div>
								<div class="grid mb0">
									<ul class="pb0 mb0 bb_none">
										<li><div class="title">Status Update</div></li>
										<li><p>This is an automated server response message. All systems are online.</p></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="row mt50">
						@include('admin.layouts.footer')
					</div>
				</div>
			</div>
		</div>
	</section>
	
@endsection