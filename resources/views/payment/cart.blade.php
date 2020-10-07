@extends('layouts.app')

@section('content')

<!-- Inner Page Breadcrumb -->
	<section class="inner_page_breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 offset-xl-3 text-center">
					<div class="breadcrumb_content">
						<h4 class="breadcrumb_title">Carrito</h4>
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
						    <li class="breadcrumb-item active" aria-current="page">Carro</li>
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>

	@inject("cart", "App\Services\Cart")
	<!-- Shop Checkouts Content -->
	<section class="shop-checkouts">
		<div class="container">
			<div class="row">
				@include('payment.cart_content')
				<div class="col-lg-4 col-xl-4">
					<div class="order_sidebar_widget mb30">
						<h4 class="title">Cart Totales</h4>
						<ul>
							<li class="subtitle"><p>Subtotal <span class="float-right">${{$cart->totalAmount()}}</span></p></li>
							<li class="subtitle"><p>Total <span class="float-right totals color-orose">${{$cart->totalAmount()}}</span></p></li>
						</ul>
					</div>
					<div class="ui_kit_button payment_widget_btn">
						<button type="button" class="btn dbxshad btn-lg btn-thm3 circle btn-block">Procesar Pago</button>
					</div>
				</div>
			</div>
		</div>
	</section>


@endsection