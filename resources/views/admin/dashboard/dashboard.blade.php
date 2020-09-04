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
					<div class="user_board">
						<div class="user_profile">
							<div class="media">
							  	<div class="media-body">
							    	<h4 class="mt-0">Start</h4>
								</div>
							</div>
						</div>
						<div class="dashbord_nav_list">
							<ul>
								<li class="active"><a href="page-dashboard.html"><span class="flaticon-puzzle-1"></span> Dashboard</a></li>
								<li><a href="page-my-courses.html"><span class="flaticon-online-learning"></span> My Courses</a></li>
								<li><a href="page-my-order.html"><span class="flaticon-shopping-bag-1"></span> Order</a></li>
								<li><a href="page-my-message.html"><span class="flaticon-speech-bubble"></span> Messages</a></li>
								<li><a href="page-my-review.html"><span class="flaticon-rating"></span> Reviews</a></li>
								<li><a href="page-my-bookmarks.html"><span class="flaticon-like"></span> Bookmarks</a></li>
								<li><a href="page-my-listing.html"><span class="flaticon-add-contact"></span> Add listing</a></li>
								@if(auth()->user()->roles[0]->full_access == 'yes')
								<li><a href="{{route('blog.create')}}"><span class="flaticon-add-contact"></span>Blog</a></li>
								@endif
								@can('haveaccess','role.index')
								<li><a href="{{route('role.index')}}"><span class="flaticon-add-contact"></span>Roles</a></li>
								@endcan
								@can('haveaccess','user.index')
								<li><a href="{{route('user.index')}}"><span class="flaticon-user"></span>Usuarios</a></li>
								@endcan
							</ul>
							<h4>Account</h4>
							<ul>
								<li><a href="page-my-setting.html"><span class="flaticon-settings"></span> Settings</a></li>
								<li><a href="page-login.html"><span class="flaticon-logout"></span> Logout</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-lg-8 col-xl-10">
					<div class="row">
						<div class="col-lg-12">
							<div class="dashboard_navigationbar dn db-991">
								<div class="dropdown">
									<button onclick="myFunction()" class="dropbtn"><i class="fa fa-bars pr10"></i> Dashboard Navigation</button>
									<ul id="myDropdown" class="dropdown-content">
										<li class="active"><a href="page-dashboard.html"><span class="flaticon-puzzle-1"></span> Dashboard</a></li>
										<li><a href="page-my-courses.html"><span class="flaticon-online-learning"></span> My Courses</a></li>
										<li><a href="page-my-order.html"><span class="flaticon-shopping-bag-1"></span> Order</a></li>
										<li><a href="page-my-message.html"><span class="flaticon-speech-bubble"></span> Messages</a></li>
										<li><a href="page-my-review.html"><span class="flaticon-rating"></span> Reviews</a></li>
										<li><a href="page-my-bookmarks.html"><span class="flaticon-like"></span> Bookmarks</a></li>
										<li><a href="page-my-listing.html"><span class="flaticon-add-contact"></span> Add listing</a></li>
									</ul>
								</div>
							</div>
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
						<div class="col-lg-6 offset-lg-3">
							<div class="copyright-widget text-center">
								<p class="color-black2">Copyright PastelArte © 2020. Todos los Derechos Resevados.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>



@endsection