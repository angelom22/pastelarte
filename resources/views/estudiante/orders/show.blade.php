@extends('admin.layouts.app')

@push('css')
    
@endpush

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
                        @include('admin.layouts.nav-admin', ['title' => 'Tus pedidos', 'page' => 'Mis Facturas'] )
						</div>
						<div class="col-lg-12">
                            <!-- Contendio de la factura -->
                            <section class="shop-order">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xl-8 offset-xl-2">
                                            <div class="shop_order_box">
                                                <h4 class="main_title">Factura</h4>
                                                <p class="text-center">{{ __("Detalle de la factura #:id#", ["id" => $order->id]) }}</p>

                                                <div class="order_list_raw">
                                                    <ul>
                                                        <li class="list-inline-item">
                                                            <h4>Cliente</h4>
                                                            <p>Nombre del cliente</p>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <h4>Fecha</h4>
                                                            <p>{{$order->created_at->format('d/m/Y')}}</p>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <h4>Total</h4>
                                                            <p>{{$order->formatted_total_amount}}</p>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <h4>Metodo de Pago</h4>
                                                            <p>Stripe</p>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <h4>Status</h4>
                                                            <p>{{ $order->formatted_status }}</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="order_details">
                                                    <h4 class="title text-center mb40">Detalles del pedido</h4>
                                                    <div class="od_content">                                                
                                                        <ul>
                                                            @foreach($order->order_lines as $line)
                                                            <li>{{ $line->curso->title }}<span class="float-right">{{ $line->formatted_price }}</span></li>
                                                            @endforeach
                                                            <li>Subtotal <span class="float-right tamount">{{ $order->formatted_total_amount }}</span></li>
                                                            <li>Total <span class="float-right tamount">{{ $order->formatted_total_amount }}</span></li>
                                                            <li>Metodo de Pago:	<span class="float-right">Stripe</span></li>
                                                            <li>Nota: <span class="float-right">Lorem Ipsum Dolar Site Amet</span></li>
                                                        </ul>
                                                        <!-- <div>
                                                            
                                                            <a href="{{ route('cursos.show', ['curso' => $line->curso]) }}">{{ __("Ir al curso") }}</a>
                                                            
                                                        </div> -->
                                                    </div>
                                                    <div class="od_details_contact text-center">
                                                        <h4 class="title2">Pastel Arte</h4>
                                                        <p class="mb0">Alborada VI etapa, Av Eleodoro Aviles Minuche y Sozoranga. Mz. 6255 Cs. 260.</p>
                                                        <p class="mb0">Guayaquil, Ecuador</p>
                                                        <p class="mb0">Telefono: (+593) 980877300</p>
                                                        <p>info@PastelArte.com</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- Boton para decargar factura -->
                            <div class="row justify-content-center">
                                <a class="btn btn-outline btn-thm" href="{{ route("estudiante.orders.download_invoice", ["order" => $order]) }}">
                                   {{ __("Descargar factura") }}
                                </a>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <a href="{{route('estudiante.orders')}}" class="my_setting_savechange_btn btn btn-thm3">
                                    <i class="fa fa-arrow-left"></i> Regrasar</a>
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
    
@endpush







