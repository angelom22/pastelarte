@extends('layouts.app')

@section('content')

<!-- Inner Page Breadcrumb -->
<section class="inner_page_breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 offset-xl-3 text-center">
                <div class="breadcrumb_content">
                    <h4 class="breadcrumb_title">Checkout</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">checkout</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Shop Checkouts Content -->
<section class="shop-checkouts">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-8 col-xl-8">
					<div class="checkout_form">
						<!-- <div class="heading text-center">
							<p>Have a coupon? <span class="text-thm6">Click here to enter your code</span></p>
						</div> -->
						<div class="checkout_coupon ui_kit_button">
							<!-- <form class="form-inline form1">
						    	<input class="form-control mr-sm-4" type="search" placeholder="Coupon Code" aria-label="Search">
						    	<button type="button" class="btn">Apply Coupon</button>
						    </form> -->
						    <h4 class="mb15">Detalles de facturación</h4>
				            <form class="form2" id="coupon_form" name="contact_form" action="#" method="post" novalidate="novalidate">
								<div class="row">
					                <div class="col-sm-6">
					                    <div class="form-group">
					                    	<label for="exampleInputName">Primer Nombre *</label>
											<input id="form_name" name="form_name" class="form-control" required="required" type="text">
										</div>
					                </div>
					                <div class="col-sm-6">
					                    <div class="form-group">
					                    	<label for="exampleInputName2">Apellido *</label>
											<input id="form_name2" name="form_name2" class="form-control" required="required" type="text">
										</div>
					                </div>
					                <div class="col-sm-12">
					                    <div class="form-group">
					                    	<label for="exampleInputName3">Nombre de empresa (opcional)</label>
											<input id="form_name3" name="form_name3" class="form-control" required="required" type="text">
										</div>
					                </div>
								    <div class="col-lg-12">
										<div class="my_profile_select_box form-group">
									    	<label for="exampleFormControlInput9">Pais *</label><br>
									    	<select class="selectpicker">
												<option>Ecuador</option>
												<option>Colombia</option>
												<option>Argentina</option>
												<option>Peru</option>
												<option>Uruguay</option>
												<option>Paraguay</option>
												<option>Chile</option>
												<option>Venezuela</option>
											</select>
										</div>
									</div>
					                <div class="col-sm-12">
					                    <div class="form-group">
					                    	<label for="exampleInputName3">Dirección *</label>
											<input id="form_name4" name="form_name4" class="form-control mb10" placeholder="House number and street name" required="required" type="text">
											<input id="form_name5" name="form_name5" class="form-control" placeholder="Apartment, suite, unit etc. (optional)" required="required" type="text">
										</div>
					                </div>
					                <div class="col-sm-6">
					                    <div class="form-group">
					                    	<label for="exampleInputName4">Código postal / ZIP *</label>
											<input id="form_name6" name="form_name6" class="form-control" required="required" type="number">
										</div>
					                </div>
					                <div class="col-sm-6">
					                    <div class="form-group">
					                    	<label for="exampleInputName5">Pueblo / Ciudad *</label>
											<input id="form_name7" name="form_name7" class="form-control" required="required" type="text">
										</div>
					                </div>
					                <div class="col-sm-6">
					                    <div class="form-group">
					                    	<label for="exampleInputProvince">Provincia *</label>
											<input id="form_name8" name="form_name8" class="form-control" required="required" type="text">
										</div>
					                </div>
					                <div class="col-sm-6">
					                    <div class="form-group">
					                    	<label for="exampleInputPhone">Celular *</label>
											<input id="form_phone" name="form_phone" class="form-control" required="required" type="number">
										</div>
					                </div>
					                <div class="col-sm-12">
					                    <div class="form-group">
					                    	<label for="exampleInputEmail">correo electrónico</label>
					                    	<input id="form_email" name="form_email" class="form-control required email" required="required" type="email">
					                    </div>
					                </div>
					                <div class="col-sm-12">
			                            <div class="form-group mb0">
			                            	<label class="ai_title" for="exampleInputTextArea">Información Adicional</label>
			                            	<p>Order notes (optional)</p>
			                                <textarea id="form_message" name="form_message" class="form-control required" rows="7" placeholder="Notes about your order, e.g. special notes for delivery." required="required"></textarea>
			                            </div>
					                </div>
				                </div>
				            </form>
						</div>
					</div>
				</div>
				@inject("cart", "App\Services\Cart")
				<div class="col-lg-4 col-xl-4">
					<div class="order_sidebar_widget mb30">
						<h4 class="title">Tu pedido</h4>
						<ul>
							<li class="subtitle"><p>Producto <span class="float-right">Precio x C/u</span></p></li>
							@foreach($cart->getContent() as $curso)
							<li><p>{{$curso->title}} <span class="float-right">${{$curso->formatted_price}}</span></p></li>
							@endforeach
							<li class="subtitle"><p>Subtotal <span class="float-right">{{$cart->totalAmount()}}</span></p></li>
							<li class="subtitle"><p>Total <span class="float-right totals color-orose">${{$cart->totalAmount()}}</span></p></li>
							
						</ul>
							
					</div>
					<div class="payment_widget">
						<div class="ui_kit_checkbox style2">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customCheck80">
								<label class="custom-control-label" for="customCheck80">Transferencia bancaria directa</label>
							</div>
							<div class="bt_details">
								<p>Realice su pago directamente en nuestra cuenta bancaria. Utilice su ID de pedido como referencia de pago. Su pedido no se enviará hasta que los fondos se hayan liquidado en nuestra cuenta..</p>
							</div>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customCheck82">
								<label class="custom-control-label" for="customCheck82">Check payments</label>
							</div>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customCheck83">
								<label class="custom-control-label" for="customCheck83">Cash on delivery</label>
							</div>
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customCheck84">
								<label class="custom-control-label" for="customCheck84">PayPal <img class="pr15" src="images/resource/payment.png" alt="payment.png"></label>
							</div>
						</div>
					</div>
					@if($cart->hasProducts())
					<div class="ui_kit_button payment_widget_btn">
						<form method="POST" action="{{ route('process_checkout') }}">
							@csrf
							<button type="submit" class="btn dbxshad btn-lg btn-thm3 circle btn-block">
								{{ __("Pagar") }}
							</button>
						</form>
					</div>
					@endif
				</div>
			</div>
		</div>
	</section>

@endsection