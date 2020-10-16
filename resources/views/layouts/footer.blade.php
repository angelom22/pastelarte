<!-- Our Footer -->
	<section class="footer_one">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-md-3 col-lg-3">
					<div class="footer_contact_widget">
						<h4>Contacto</h4>
						<p>Alborada VI etapa, Av Eleodoro Aviles </p>
						<p>Minuche y Sozoranga. Mz. 6255 Cs. 260. Guayaquil, Ecuador</p>
						<p>+593 980877300</p>
						<p>info@pastelarte.com.ec</p>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-md-3 col-lg-2">
					<div class="footer_company_widget">
						<h4>Pastel Arte</h4>
						<ul class="list-unstyled">
							<li><a href="{{ url('cursos') }}">Cursos</a></li>
							<li><a href="{{ url('evento') }}">Eventos</a></li>
							<li><a href="{{ url('blog') }}">Blog</a></li>
							<li><a href="{{ url('Contacto') }}">Contacto</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-md-3 col-lg-2">
					<div class="footer_program_widget">
						<h4>Cursos</h4>
						<ul class="list-unstyled">
							<li><a href="{{ url('cursos') }}">Todos los cursos</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-md-3 col-lg-2">
					<div class="footer_support_widget">
						<h4>Carreras</h4>
						<ul class="list-unstyled">
							<li><a href="{{ route('filtrarCarrera','pasteleria') }}">Pastelería</a></li>
                        <li><a href="{{ route('filtrarCarrera','decoracion-de-tortas') }}">Decoración de tortas</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-md-3 col-lg-3">
					<div class="footer_apps_widget">
						<h4>Siguenos</h4>
						<div class="app_grid">
							<a href="https://www.instagram.com/pastelarte" target="_blank">
							<button class="apple_btn btn-dark">
								<span class="icon">
									<img src="{{asset('img/instagram.png')}}">
								</span>
								<span class="title"> Instagram</span>
								<span class="subtitle">@pastelarte</span>
							</button>
							</a>
							<a href="https://www.facebook.com/PastelArteEscuela" target="_blank">
							<button class="play_store_btn btn-dark">
								<span class="icon">
									<img src="{{asset('img/facebook.png')}}">
								</span>
								<span class="title">Facebook</span>
								<span class="subtitle">@escuelapastelarte</span>
							</button>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Our Footer Middle Area -->
	<section class="footer_middle_area p0">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-md-3 col-lg-3 col-xl-2 pb15 pt15">
					<div class="logo-widget home1">
						<img class="img-fluid" src="{{asset('img/header-logo.png')}}" alt="header-logo.png">
						<span>Pastel Arte</span>
					</div>
				</div>
				<div class="col-sm-8 col-md-5 col-lg-6 col-xl-6 pb25 pt25">
					<div class="footer_menu_widget">
						<ul>
							<li class="list-inline-item"><a href="{{ url('/') }}">Home</a></li>
							<li class="list-inline-item"><a href="#">Privacy</a></li>
							<li class="list-inline-item"><a href="{{route('terminos.privacidad')}}">Terms</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-12 col-md-4 col-lg-3 col-xl-4 pb15 pt15">
					<div class="footer_social_widget mt15">
						<ul>
							<li class="list-inline-item"><a href="https://www.facebook.com/PastelArteEscuela" target="_blank"><i class="fa fa-facebook"></i></a></li>
							<li class="list-inline-item"><a href="https://www.instagram.com/pastelarte" target="_blank"><i class="fa fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Our Footer Bottom Area -->
	<section class="footer_bottom_area pt25 pb25">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="copyright-widget text-center">
						<p>Copyright Pastel Arte © <?php echo date('Y');?>. Todos los derechos reservados. Desarrollo<a href="https://www.veneztec.com" target="_blank" style="color: #ffffff;"> Veneztec</a></p>
					</div>
				</div>
			</div>
		</div>
	</section>