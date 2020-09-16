@extends('layouts.app')

@section('content')

	<!-- Inner Page Breadcrumb -->
	<section class="inner_page_breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 offset-xl-3 text-center">
					<div class="breadcrumb_content">
						<h4 class="breadcrumb_title">Contacto</h4>
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Contactanos</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- How It's Work -->
	<section class="our-contact">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-4">
					<div class="contact_localtion text-center">
						<div class="icon"><span class="flaticon-placeholder-1"></span></div>
						<h4>Ubicación</h4>
						<p>Alborada VI etapa, Av Eleodoro Aviles Minuche y Sozoranga. Mz. 6255 Cs. 260. Guayaquil, Ecuador</p>
					</div>
				</div>
				<div class="col-sm-6 col-lg-4">
					<div class="contact_localtion text-center">
						<div class="icon"><span class="flaticon-phone-call"></span></div>
						<h4>Contacto</h4>
						<p class="mb0">Telefono: (+593) 980877300 </p>
					</div>
				</div>
				<div class="col-sm-6 col-lg-4">
					<div class="contact_localtion text-center">
						<div class="icon"><span class="flaticon-email"></span></div>
						<h4>Email</h4>
						<p>info@pastelarte.com.ec</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="h600">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.037103533422!2d-79.90849798554905!3d-2.139457798440452!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x902d6d6fb93fd127%3A0x781974caaad09b64!2sEleodoro%20Aviles%20Minuche%20%26%20Sozoranga%2C%20Guayaquil%20090508%2C%20Ecuador!5e0!3m2!1ses!2sve!4v1599595277215!5m2!1ses!2sve" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					</div>
				</div>
				<div class="col-lg-6 form_grid">
					<h4 class="mb5">Enviar mensaje</h4>
		            <form class="contact_form" id="contact_form" name="contact_form" action="#" method="POST" novalidate="novalidate">
						@csrf
						<div class="row">
			                <div class="col-sm-12">
			                    <div class="form-group">
			                    	<label for="exampleInputName">Nombre y Apellido</label>
									<input id="form_name" name="form_name" class="form-control" required type="text">
								</div>
			                </div>
			                <div class="col-sm-12">
			                    <div class="form-group">
			                    	<label for="exampleInputEmail">Email</label>
			                    	<input id="form_email" name="form_email" class="form-control required email" required type="email">
			                    </div>
			                </div>
			                <div class="col-sm-12">
	                            <div class="form-group">
	                            	<label for="exampleInputEmail1">Mensaje</label>
	                                <textarea id="form_message" name="form_message" class="form-control required" rows="5" required></textarea>
	                            </div>
			                    <div class="form-group ui_kit_button mb0">
				                    <button type="button" class="btn dbxshad btn-lg btn-thm circle white">Enviar</button>
			                    </div>
			                </div>
		                </div>
		            </form>
				</div>
			</div>
		</div>
	</section>


@endsection