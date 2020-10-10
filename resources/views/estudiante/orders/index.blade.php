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
									<div class="table-responsive">
                                        @include('custom.message')
                                        <table class="table table-striped table-bordered">
                                            <thead class="thead-dark">
                                                <tr class="text-center">
                                                    <th>{{ __("#ID") }}</th>
                                                    <th>{{ __("Costo total") }}</th>
                                                    <th>{{ __("Cupón") }}</th>
                                                    <th>{{ __("Fecha del pedido") }}</th>
                                                    <th>{{ __("Estado") }}</th>
                                                    <th>{{ __("Número de cursos") }}</th>
                                                    
                                                        <th>{{ __("Acciones") }}</th>
                                                    
                                                </tr>   
                                            </thead>
                                            <tbody>
                                                @forelse($orders as $order)
                                                <tr class="text-center">
                                                    <td>{{ $order->id }}</td>
                                                    <td>{{ $order->formatted_total_amount }}</td>
                                                    <td>{{ $order->coupon_code }}</td>
                                                    <td>{{ $order->created_at->format("d/m/Y") }}</td>
                                                    <td>{{ $order->formatted_status }}</td>
                                                    <td>{{ $order->order_lines_count }}</td>                                      
                                                    <td>
                                                        <a class="btn btn-outline-dark" href="{{ route('estudiante.orders.show', ['order' => $order]) }}">
                                                            <i class="fa fa-eye"></i> {{ __("Ver detalle") }}
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


