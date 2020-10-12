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
                            <div class="my_course_content_container">
                                <div class="my_setting_content mb30">
                                    <div class="my_setting_content_header">
										<div class="my_sch_title">
											<h4 class="m0">Mis facturas</h4>
										</div>
                                    </div>
                                    <div class="my_setting_content_details pb0">
										<div class="cart_page_form style2">
                                            @include('custom.message')
                                            <table class="table table-responsive">
                                                <thead>
                                                    <tr class="carttable_row">
                                                        <th class="cartm_title">{{ __("#ID") }}</th>
                                                        <th class="cartm_title">{{ __("Cupón") }}</th>
                                                        
                                                        <th class="cartm_title">{{ __("Fecha del pedido") }}</th>
                                                        <th class="cartm_title">{{ __("Estado") }}</th>
                                                        <th class="cartm_title">{{ __("total") }}</th>
                                                        <th class="cartm_title">{{ __("Número de cursos") }}</th> 
                                                        <th class="cartm_title">{{ __("Acciones") }}</th>         
                                                    </tr>   
                                                </thead>
                                                <tbody class="table_body"> 
                                                    @forelse($orders as $order)
                                                    <tr class="text-center">
                                                        <td scope="row">{{ $order->id }}</td>
                                                        
                                                        <td>{{ $order->coupon_code }}</td>
                                                        <td>{{ $order->created_at->format("d/m/Y") }}</td>
                                                        <td>{{ $order->formatted_status }}</td>
                                                        <td>{{ $order->formatted_total_amount }}</td>
                                                        <td>{{ $order->order_lines_count }}</td>                                      
                                                        <td>
                                                            <a class="btn btn-outline-dark btn-sm" href="{{ route('estudiante.orders.show', ['order' => $order]) }}">
                                                                <i class="fa fa-eye" aria-hidden="true"></i> {{ __("Ver detalle") }}
                                                            </a>
                                                            <a class="btn btn-outline btn-thm btn-sm" href="{{ route("estudiante.orders.download_invoice", ["order" => $order]) }}">
                                                            <i class="fa fa-print" aria-hidden="true"></i>{{ __("Descargar") }}
                                                            </a>
                                                        </td>    
                                                    </tr>
                                                    @empty
                                                    <tr class="text-center">
                                                        <td colspan="7">
                                                            <div class="empty-results">
                                                                <h3> <strong> {!! __("No tienes ningún pedido todavía") !!}</strong> </h3>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                    <div class="row text-center">
                                        <div class="col-lg-12">
                                            <div class="mbp_pagination mt20">
                                                <ul class="page_navigation">
                                                @if(count($orders))
                                                    {{ $orders->links() }}
                                                @endif
                                                </ul>
                                            </div> 
                                        </div>
                                    </div>
                                    
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


